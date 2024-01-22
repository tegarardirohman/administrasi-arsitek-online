<?php

namespace App\Http\Controllers;

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
use DB;


use Illuminate\Http\Request;



class HalamanCS extends Controller
{
    public function Dashboard(){
        return view('cs/dashboard');
    }

// proyek
    public function Proyek($mode){

        if($mode == "semua"){
            $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
                        ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
                        ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
                        ->join('tb_pelanggan', 'tb_akun.akun_id', '=', 'tb_pelanggan.akun_id')
                        ->get();
        }else{
            $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
            ->join('tb_pelanggan', 'tb_akun.akun_id', '=', 'tb_pelanggan.akun_id')
            ->where('pry_status', '=', $mode)->get();
        }

        // show jenis bangunan
        $jenis_bangunan = tb_jenis_bangunan::all();

        // show layanan
        $layanan = tb_layanan::all();

        // show pelanggan
        $akun = tb_akun::all();

        // show style
        $style = Style::all();

        // show proyek style
        $pStyle = proyek_style::leftjoin('style', 'proyek_style.id_style', '=', 'style.id_style')->get();

        return view('cs/proyek')->with('post', $post)->with('mode', $mode)
        ->with('jenis_bangunan', $jenis_bangunan)
        ->with('layanan', $layanan)
        ->with('akun', $akun)
        ->with('style', $style)
        ->with('pStyle', $pStyle);
    }

    public function TambahProyek(Request $request)
    {
        // validate
        $this->validate($request, [
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

        $pry_status = 'berjalan';

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
            'pry_total' => $total_harga,
            'catatan' => $request->catatan,
            'pry_status' => $pry_status
            
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

        // Insert into tb_hasil_desain
        // $biaya = 0.3*$total_harga;

        // tb_hasil_desain::insert([
        //     'proyek_id' => $proyekId,
        //     'desain_tahap' => 1,
        //     'desain_biaya' => $biaya,
        //     'status' => 'proses'
        // ]);

        return redirect('cs/proyek/berjalan');
    }


    public function HapusProyek(Request $request)
    {

        tb_proyek::where('pry_id', $request->del_id_proyek)
            ->delete();

        return redirect('cs/proyek/'.$request->mode);
    }



    public function DetailProyek($id){

        $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
            ->join('tb_pelanggan', 'tb_akun.akun_id', '=', 'tb_pelanggan.akun_id')
            // ->join('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->where('pry_id', '=', $id)->first();

        $file_tambahan = File_Proyek::where('id_proyek', '=', $id)->first();

        $style = proyek_style::join('style', 'proyek_style.id_style', '=', 'style.id_style')
            ->where('id_proyek', '=', $id)->get();

        $hasil_desain = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'tb_hasil_desain.desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->where('proyek_id', '=', $id)->get();
        
        return view('cs/detail_proyek')->with('post', $post)->with('file_proyek', $file_tambahan)
            ->with('hasil_desain', $hasil_desain)->with('style', $style);
    }

    public function AddFileDesain(Request $request)
    {
   
        // move file
        $fileName = $request->nama_file.'.'.$request->file->extension();
        $request->file->move(public_path('asset/file/hasil_desain'), $fileName);

        tb_detail_hasil_desain::where('id_detail_desain', $request->id_detail_desain)
            ->update(['file' => $fileName, 'status' => 'dikirim']);

        return redirect('cs/detail_proyek/'.$request->id_proyek);
    }

    public function DeleteFileDesain(Request $request)
    {
        $data = tb_detail_hasil_desain::leftjoin('tb_hasil_desain', 'tb_hasil_desain.desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->where('id_detail_desain', $request->id_detail_desain)->first();  

        // delete file

        File::delete('asset/file/hasil_desain/'.$data->file);

        // edit
        tb_detail_hasil_desain::where('id_detail_desain', $request->id_detail_desain)
            ->update(['file' => '', 'status' => 'proses']);

        return redirect('cs/detail_proyek/'.$data->proyek_id);
    }




// pembayaran
    public function Pembayaran(){
        
        //get posts
        $post = pembayaran::join('tb_hasil_desain', 'tb_pembayaran.pby_desain_id', '=', 'tb_hasil_desain.desain_id')
                        ->join('tb_proyek', 'tb_hasil_desain.proyek_id', '=', 'tb_proyek.pry_id')->get();

        //render view with posts
        return view('cs/pembayaran')->with('post', $post);

        // return view('cs/pembayaran');
    }

    public function EditPembayaran(Request $request, $id)
    {
        $post = pembayaran::findOrfail($id);

        $post->pby_status = $request->opsi;
        $post->save();

        return redirect('cs/pembayaran');
    }




    public function Data_Pelanggan(){
        return view('cs/pelanggan');
    }

    public function Data_CS(){
        return view('cs/CS');
    }

    public function Data_Admin(){
        return view('cs/admin');
    }


// portofolio
    public function Portofolio(){

    // $post = portofolio::leftjoin('tb_pf_img', 'tb_portofolio.pf_id', '=', 'tb_pf_img.pf_img_id_portofolio')->get();
    $post = portofolio::join('kota_kab', 'tb_portofolio.pf_alamat', '=', 'kota_kab.id_kota')->get();
    // kota
    $kota = kota::all();

    //image 
    $image = tb_pf_img::all();

        return view('cs/portofolio')->with('post', $post)->with('kota', $kota)->with('img', $image);
    }

    // tambah portofolio
    public function AddPortofolio(Request $request)
    {
        $pfId = DB::table('tb_portofolio')->insertGetId([
            'pf_nama' => $request->nama,
            'pf_alamat' => $request->alamat,
            'pf_keterangan' => $request->keterangan,
        ]);

        if($request->hasfile('filename')){
            
            $i = 0;
            foreach($request->file('filename') as $item){
                $i++;
                // move file
                $fileName = time().'-'.$i.'.'.$item->extension();
                $item->move(public_path('asset/images/portofolio'), $fileName);

                DB::table('tb_pf_img')->insert([
                    'pf_img_id_portofolio' => $pfId,
                    'pf_img_img' => $fileName
                ]);
            }

        }else{
            dd($request);
        }
        return redirect('cs/portofolio');
    }

    // hapus portofolio
    public function DeletePortofolio($id)
    {
    
        $img = tb_pf_img::where('pf_img_id', $id)->get();
        if(!empty($img)){
            foreach($img as $im){
                File::delete(public_path('asset/images/portofolio/'.$im->pf_img_img));
            }
        }

        tb_pf_img::where('pf_img_id_portofolio', $id)
            ->delete();

        portofolio::where('pf_id', $id)
            ->delete();

        return redirect('cs/portofolio');
    }

    // Edit portofolio
    public function EditPortofolio(Request $request)
    {

        $img = tb_pf_img::where('pf_img_id', $request->id_pf)->get();
        
        if($request->hasfile('filename')){
            // hapus file
            $img = tb_pf_img::where('pf_img_id',$request->id_pf)->get();
            if(!empty($img)){
                foreach($img as $im){
                    File::delete(public_path('asset/images/portofolio/'.$im->pf_img_img));
                }
            }

            // hapus data dari pf_img
            tb_pf_img::where('pf_img_id_portofolio', $request->id_pf)
                ->delete();

            // insert gambar baru
            $i = 0;
            foreach($request->file('filename') as $item){
                $i++;
                // move file
                $fileName = time().'-'.$i.'.'.$item->extension();
                $item->move(public_path('asset/images/portofolio'), $fileName);

                DB::table('tb_pf_img')->insert([
                    'pf_img_id_portofolio' => $request->id_pf,
                    'pf_img_img' => $fileName
                ]);
            }

        }


        DB::table('tb_portofolio')->where('pf_id',$request->id_pf)->update([
            'pf_nama' => $request->nama,
            'pf_alamat' => $request->alamat,
            'pf_keterangan' => $request->keterangan
        ]);
    

        return redirect('cs/portofolio');
    }


    public function Layanan(){
       
        $post = tb_layanan::all();
        // kota
        $ly_item = tb_relasi_layanan::join('tb_layanan_item', 'tb_relasi_layanan.id_layanan_item', '=', 'tb_layanan_item.ly_item_id')->get();

        //ly_item
        $ly_items = tb_layanan_item::all();

        // ly_item_relasi
        $relasi = tb_relasi_layanan::all();
        
        return view('cs/layanan')->with('post', $post)->with('ly_item', $ly_item)->with('ly_items', $ly_items)->with('relasi', $relasi);
    }

    public function AddLayanan(Request $request)
    {

        // move file
        $fileName = time().'.'.$request->file('img_layanan')->extension();
        $request->file('img_layanan')->move(public_path('asset/images/paket'), $fileName);

        // get last insert id
        $lyId = DB::table('tb_layanan')->insertGetId([
            'ly_nama' => $request->nama,
            'ly_img' => $fileName,
            'ly_harga' => $request->harga,
        ]);

        // insert item layanan
        if(!empty($request->layanan_item)){
            foreach($request->layanan_item as $st){
                tb_relasi_layanan::create([
                    'id_layanan' => $lyId,
                    'id_layanan_item' => $st
                ]);
            }
        }


        return redirect('cs/layanan');
    }

    public function EditLayanan(Request $request)
    {

        if($request->hasfile('img_layanan')){
            // hapus image
            $img = tb_layanan::where('ly_id',$request->id_layanan)->first();
            if(!empty($img)){
                File::delete(public_path('asset/images/paket/'.$img->ly_img));
            }

            // move new file
            $fileName = time().'.'.$request->file('img_layanan')->extension();
            $request->file('img_layanan')->move(public_path('asset/images/paket'), $fileName);

            // edit tabel layanan
            DB::table('tb_layanan')->where('ly_id',$request->id_layanan)->update([
                'ly_nama' => $request->nama,
                'ly_img' => $fileName,
                'ly_harga' => $request->harga
            ]);

        }else{

            // edit tabel layanan
            DB::table('tb_layanan')->where('ly_id',$request->id_layanan)->update([
                'ly_nama' => $request->nama,
                'ly_harga' => $request->harga
            ]);

        }
        

        // hapus semua item layanan
        tb_relasi_layanan::where('id_layanan', $request->id_layanan)
                ->delete();

        // insert item layanan
        if(!empty($request->layanan_item)){
            foreach($request->layanan_item as $st){
                tb_relasi_layanan::create([
                    'id_layanan' => $request->id_layanan,
                    'id_layanan_item' => $st
                ]);
            }
        }

        return redirect('cs/layanan');
    }


    public function HapusLayanan(Request $request)
    {

        $img = tb_layanan::where('ly_id',$request->id_layanan)->value('ly_img');

        if(!empty($img)){
            File::delete(public_path('asset/images/paket/'.$img));
        }
       
        // hapus semua item layanan
        tb_relasi_layanan::where('id_layanan', $request->id_layanan)
                ->delete();
        
        //hapus layanan
        $img = tb_layanan::where('ly_id', $request->id_layanan)->delete();


        return redirect('cs/layanan');
    }

    public function Item_paket(){
       
        $post = tb_layanan::all();
        // kota
        $ly_item = tb_relasi_layanan::join('tb_layanan_item', 'tb_relasi_layanan.id_layanan_item', '=', 'tb_layanan_item.ly_item_id')->get();

        //ly_item
        $ly_items = tb_layanan_item::all();

        // ly_item_relasi
        $relasi = tb_relasi_layanan::all();
        
        return view('cs/item_paket')->with('post', $post)->with('ly_item', $ly_item)->with('ly_items', $ly_items)->with('relasi', $relasi);
    }




}
