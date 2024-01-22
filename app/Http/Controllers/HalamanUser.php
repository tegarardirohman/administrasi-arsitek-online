<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\tb_proyek;
use App\Models\tb_layanan;
use App\Models\tb_jenis_bangunan;
use App\Models\tb_akun;
use App\Models\File_Proyek;
use App\Models\tb_hasil_desain;
use App\Models\tb_detail_hasil_desain;
use App\Models\Style;
use App\Models\proyek_style;
use App\Models\portofolio;
use App\Models\kota;
use App\Models\tb_pf_img;
use App\Models\tb_layanan_item;
use App\Models\tb_relasi_layanan;


use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;


class HalamanUser extends Controller
{

    // halaman login
    public function Login(){
        return view('pelanggan/login');
    }

    // halaman Daftar
    public function Daftar(){
        return view('pelanggan/daftar');
    }
    
    // halaman index
    public function index(){
        // $pf = portofolio::join('tb_pf_img', 'tb_portofolio.pf_id', '=', 'tb_pf_img.pf_img_id_portofolio')
        // ->limit(9)->get();

        $pf = portofolio::join('kota_kab', 'tb_portofolio.pf_id', '=', 'kota_kab.id_kota')->limit(9)->get();
        $pf_img = tb_pf_img::all();

        $cs = tb_akun::where('level', 'cs')->orWhere('level', 'admin')->orderBy('level', 'desc')->limit(3)->get();

        return view('pelanggan/index')->with('portofolio', $pf)->with('pf_img', $pf_img)->with('cs', $cs);
    }


    // halaman proyek
    public function Proyek(){

        $posts = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
        ->leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
        ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
        ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
        // ->join('tb_pelanggan', 'tb_akun.akun_id', '=', 'tb_pelanggan.akun_id')
        ->orderBy('pry_tgl')->get();

        if(Auth::check()){
            $post = tb_proyek::leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->leftjoin('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->leftjoin('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->leftjoin('kota_kab', 'tb_proyek.pry_alamat', '=', 'kota_kab.id_kota')
            ->where('pry_id_akun', Auth::User()->akun_id)
            ->where('pry_status', 'diajukan')->get();

            $post_berjalan = tb_proyek::leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->leftjoin('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->leftjoin('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->leftjoin('kota_kab', 'tb_proyek.pry_alamat', '=', 'kota_kab.id_kota')
            ->where('pry_id_akun', Auth::User()->akun_id)
            ->where('pry_status', 'berjalan')->get();

            $post_selesai = tb_proyek::leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->leftjoin('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->leftjoin('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->leftjoin('kota_kab', 'tb_proyek.pry_alamat', '=', 'kota_kab.id_kota')
            ->where('pry_id_akun', Auth::User()->akun_id)
            ->where('pry_status', 'selesai')->get();

            $post_ditolak = tb_proyek::leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->leftjoin('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->leftjoin('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->leftjoin('kota_kab', 'tb_proyek.pry_alamat', '=', 'kota_kab.id_kota')
            ->where('pry_id_akun', Auth::User()->akun_id)
            ->where('pry_status', 'ditolak')->get();

        }else{
            $post = tb_proyek::first();
            $post_berjalan = tb_proyek::first();
            $post_selesai = tb_proyek::first();
            $post_ditolak = tb_proyek::first();
        }

        // alamat
        $alamats = kota::all();
        
        
        //layanan
        $ly = tb_layanan::all();

        $jenis_bangunan = tb_jenis_bangunan::all();
        $styles = Style::all();
        $pStyle = proyek_style::all();

        $akun = tb_akun::all();

        return view('pelanggan/proyek')
            ->with('post_berjalan', $post_berjalan)
            ->with('post_selesai', $post_selesai)
            ->with('post_ditolak', $post_ditolak)
            ->with('akun', $akun)
            ->with('pStyle', $pStyle)
            ->with('posts', $posts)
            ->with('post', $post)
            ->with('ly', $ly)
            ->with('jbs', $jenis_bangunan)
            ->with('styles', $styles)
            ->with('alamats', $alamats);
    }

    // tambah proyek
    public function AddProyek(Request $request)
    {

        // validate
        $this->validate($request, [
            'jenis_bangunan' => 'required',
            'panjang' => 'required|min:1',
            'lebar' => 'required|min:1',
            'jumlah_lantai' => 'required|min:1',
            'layanan' => 'required',
            'pelanggan' => 'required',
            'alamat' => 'required'
        ]);

        // get data
        $luas = ($request->panjang * $request->lebar * $request->jumlah_lantai);

        $layanan = tb_layanan::where('ly_id', '=', $request->layanan)->first();

        $plg = tb_akun::where('akun_id', '=', $request->pelanggan)->first();

        $total_harga = $luas * $layanan->ly_harga;

        if($plg->gender == 'L'){
            $as = "Bapak";
        }else{
            $as = "Ibu";
        }

        $pry_nama = 'Proyek '.$as.' '.$plg->nama; 

        $proyekId = DB::table('tb_proyek')->insertGetId([
            'pry_nama' => $pry_nama,
            'pry_jenis_bangunan' => $request->jenis_bangunan,
            'pry_panjang' => $request->panjang,
            'pry_lebar' => $request->lebar,
            'pry_lantai' => $request->jumlah_lantai,
            'pry_luas' => $luas,
            'pry_ly_id' => $request->layanan,
            'pry_id_akun' => $request->pelanggan,
            'pry_alamat' => $request->alamat,
            'pry_total' => $total_harga,
            'catatan' => $request->catatan,
            'pry_status' => 'diajukan'
            
        ]);

        if(!empty($request->style)){
            foreach($request->style as $st){
                proyek_style::create([
                    'id_proyek' => $proyekId,
                    'id_style' => $st
                ]);
            }
       }

        if(!empty($request->file)){
            // insert ke file
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('asset/file'), $fileName);

            DB::table('file_proyek')->insert([
                'id_proyek' => $proyekId,
                'file' => $fileName
            ]);
        }

        return redirect('/proyek');
    }

    // delete proyek
    public function DeleteProyek($id)
    {
        $id_hasil = tb_hasil_desain::where('proyek_id', $id)->value('desain_id');
        
        if(!empty($id_hasil)){
            tb_detail_hasil_desain::where('id_detail_desain', $id_hasil);
        }
        
        $file = file_proyek::where('id_proyek', $id)->get();
        if(!empty($file->file)){
            foreach($file as $delF){
                File::delete('asset/images/portofolio/'.$delF->file);
            }
        }

        proyek_style::where('id_proyek', $id)->delete();

        file_proyek::where('id_proyek', $id)->delete();

        tb_proyek::where('pry_id', $id)
            ->delete();

        return redirect('/proyek');
    }


    // edit proyek
    public function EditProyek(Request $request)
    {
        // validate
        $this->validate($request, [
            'id_proyek' => 'required',
            'jenis_bangunan' => 'required',
            'panjang' => 'required|min:1',
            'lebar' => 'required|min:1',
            'jumlah_lantai' => 'required|min:1',
            'layanan' => 'required',
            'pelanggan' => 'required'
        ]);

        // get data
        $luas = ($request->panjang * $request->lebar * $request->jumlah_lantai);

        $layanan = tb_layanan::where('ly_id', '=', $request->layanan)->first();

        $plg = tb_akun::where('akun_id', '=', $request->pelanggan)->first();

        $total_harga = $luas * $layanan->ly_harga;

        if($plg->gender == 'L'){
            $as = "Bapak";
        }else{
            $as = "Ibu";
        }

        $pry_nama = 'Proyek '.$as.' '.$plg->nama; 

        tb_proyek::where('pry_id', $request->id_proyek)
            ->update([
                'pry_nama' => $pry_nama,
                'pry_jenis_bangunan' => $request->jenis_bangunan,
                'pry_panjang' => $request->panjang,
                'pry_lebar' => $request->lebar,
                'pry_lantai' => $request->jumlah_lantai,
                'pry_luas' => $luas,
                'pry_ly_id' => $request->layanan,
                'pry_total' => $total_harga,
                'catatan' => $request->catatan,
                'pry_status' => 'diajukan'
            ]);


        if(!empty($request->style)){
            // hapus jika ada style
            $data = proyek_style::where('id_proyek', $request->id_proyek)->delete();

            // insert new style
            foreach($request->style as $st){
                proyek_style::create([
                    'id_proyek' => $request->id_proyek,
                    'id_style' => $st
                ]);
            }
       }

        if(!empty($request->file)){
            // hapus jika ada file
            $data = file_proyek::where('id_proyek', $request->id_proyek)->get();

            foreach($data as $del){
                // delete file dari folder
                File::delete('asset/images/portofolio/'.$del->file);
            }

            file_proyek::where('id_proyek', $request->id_proyek)->delete();
            $i = 0;
            foreach($request->file('file_proyek') as $fp)
                $i++;

                // insert ke file
                $fileName = time().'-'.$i.'.'.$fp->extension();
                $fp->move(public_path('asset/file'), $fileName);

                DB::table('file_proyek')->insert([
                    'id_proyek' => $request->id_proyek,
                    'file' => $fileName
                ]);
        }

        return redirect('/proyek');
    }

    // end edit proyek


    // pengerjaan proyek
    public function Pengerjaan_Proyek($id){

        $post = tb_proyek::where('pry_id', $id)->first();
        $tb_hasil1 = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->join('tb_pembayaran', 'tb_hasil_desain.desain_id', '=', 'tb_pembayaran.pby_desain_id')    
            ->where('proyek_id', $id)
            ->where('desain_tahap', '1')->take(1)->get();
        
        $tb_hasil2 = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->join('tb_pembayaran', 'tb_hasil_desain.desain_id', '=', 'tb_pembayaran.pby_desain_id')    
            ->where('proyek_id', $id)
            ->where('desain_tahap', '2')->take(1)->get();

        $tb_hasil3 = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->join('tb_pembayaran', 'tb_hasil_desain.desain_id', '=', 'tb_pembayaran.pby_desain_id')    
            ->where('proyek_id', $id)
            ->where('desain_tahap', '3')->take(1)->get();

        $hasil_desain = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'tb_hasil_desain.desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->where('proyek_id', '=', $id)->get();
        
        return view('pelanggan/pengerjaan_proyek')->with('hasil_desain', $hasil_desain)->with('id_proyek', $id)->with('post', $post)->with('tb_hasil1', $tb_hasil1)->with('tb_hasil2', $tb_hasil2)->with('tb_hasil3', $tb_hasil3);
    }


    // revisi
    public function Revisi(Request $request)
    {

        DB::table('tb_detail_hasil_desain')->insert([
            'id_hasil_desain' => $request->id_desain,
            'catatan' => $request->catatan,
            'det_status' => 'revisi'
        ]);

        return redirect()->back();
    }

    // Acc Desain
    public function AccDesain($id_hasil, $id_detail)
    {
        $data = tb_hasil_desain::where('desain_id', $id_hasil)->first();

        if($data->desain_tahap == 3){
            tb_proyek::where('pry_id', $data->proyek_id)->update([
                'pry_status' => 'selesai'
            ]);
        }

        tb_detail_hasil_desain::where('id_detail_desain', $id_detail)
            ->update(['det_status' => 'selesai']);

        tb_hasil_desain::where('desain_id', $id_hasil)
            ->update(['status' => 'selesai']);

        return redirect()->back();
    }



       // pembayaran
       public function Pembayaran(Request $request)
       {
   
           if($request->tahap == 1 || $request->tahap == 2){
               $biaya = 0.3*$request->biaya;
           }else{
               $biaya = 0.4*$request->biaya;
           }
   
           $tbhId = DB::table('tb_hasil_desain')->insertGetId([
               'proyek_id' => $request->id_proyek,
               'desain_tahap' => $request->tahap,
               'desain_biaya' => $biaya,
               'status' => 'belum dibayar'
           ]);
   
           $fileName = time().'.'.$request->file('img_bukti')->extension();
           $request->file('img_bukti')->move(public_path('asset/images/bukti_bayar'), $fileName);
   
           DB::table('tb_pembayaran')->insert([
               'pby_desain_id' => $tbhId,
               'bank' => $request->bank,
               'nama_rek' => $request->nama_rek,
               'no_rek' => $request->no_rek,
               'pby_img' => $fileName,
               'pby_status' => 'diajukan'
           ]);
   
           return redirect()->back();
   
       }

    // halaman portofolio
    public function Portofolio(){

        $pf = portofolio::join('kota_kab', 'tb_portofolio.pf_id', '=', 'kota_kab.id_kota')->orderBy('tanggal', 'asc')->get();
        $pf_img = tb_pf_img::all();

        return view('pelanggan/portofolio')->with('pf', $pf)->with('pf_img', $pf_img);
    }

    // detail pf
    public function Detail_portofolio($id)
    {
        $post = portofolio::join('kota_kab', 'tb_portofolio.pf_alamat', '=', 'kota_kab.id_kota')
            ->where('pf_id', $id)->first();

        return view('pelanggan/detail_portofolio')->with('post', $post);
    }

    // halaman layanan
    public function Layanan(){
       
        $post = tb_layanan::all();
        // kota
        $ly_item = tb_relasi_layanan::join('tb_layanan_item', 'tb_relasi_layanan.id_layanan_item', '=', 'tb_layanan_item.ly_item_id')->get();

        //ly_item
        $ly_items = tb_layanan_item::all();

        // ly_item_relasi
        $relasi = tb_relasi_layanan::all();
        
        return view('pelanggan/layanan')->with('post', $post)->with('ly_item', $ly_item)->with('ly_items', $ly_items)->with('relasi', $relasi);
    }

    // halaman proyek
    public function Kontak(){

        $cs = tb_akun::where('level', 'cs')->orWhere('level', 'admin')->orderBy('level', 'desc')->limit(3)->get();


        return view('pelanggan/kontak')->with('cs', $cs);
    }


 

}
