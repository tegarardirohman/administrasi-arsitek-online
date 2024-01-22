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
use Illuminate\Support\Facades\Hash;
use DB;


use Illuminate\Http\Request;



class HalamanAdmin extends Controller
{
    public function Dashboard(){
        return view('admin/dashboard');
    }

// proyek
    public function Proyek($mode){

        if($mode == "semua"){
            $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
                        ->leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
                        ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
                        ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
                        // ->join('tb_pelanggan', 'tb_akun.akun_id', '=', 'tb_pelanggan.akun_id')
                        ->orderBy('pry_tgl')->get();
        }else{
            $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->leftjoin('file_proyek', 'tb_proyek.pry_id', '=', 'file_proyek.id_proyek')
            ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->join('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
            ->where('pry_status', $mode)->orderBy('pry_tgl')->get();
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

        // alamat
        $alamat = kota::all();

        return view('admin/proyek')->with('post', $post)->with('mode', $mode)
        ->with('jenis_bangunan', $jenis_bangunan)
        ->with('layanan', $layanan)
        ->with('akun', $akun)
        ->with('style', $style)
        ->with('pStyle', $pStyle)
        ->with('alamat', $alamat);
    }


    // tambah proyek
    public function TambahProyek(Request $request)
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
            'pry_status' => $request->status
            
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


        return redirect('admin/proyek/'.$request->mode);
    }


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
                'pry_id_akun' => $request->pelanggan,
                'pry_total' => $total_harga,
                'catatan' => $request->catatan,
                'pry_status' => $request->status
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

            // hapus jika ada file
            $data = file_proyek::where('id_proyek', $request->id_proyek)->get();

            foreach($data as $del){
                // delete file dari folder
                File::delete('asset/images/portofolio/'.$del->file);
            }

        return redirect('admin/proyek/'.$request->mode);
    }

    // end edit proyek


    // hapus proyek
    public function HapusProyek(Request $request)
    {
        $id_hasil = tb_hasil_desain::where('proyek_id', $request->del_id_proyek)->value('desain_id');
        
        if(!empty($id_hasil)){
            tb_detail_hasil_desain::where('id_detail_desain', $id_hasil);
        }
        
        $file = file_proyek::where('id_proyek', $request->del_id_proyek)->get();
        if(!empty($file->file)){
            foreach($file as $delF){
                File::delete('asset/images/portofolio/'.$delF->file);
            }
        }

        file_proyek::where('id_proyek', $request->del_id_proyek)->delete();

        tb_proyek::where('pry_id', $request->del_id_proyek)
            ->delete();

        return redirect('admin/proyek/'.$request->mode);
    }



    public function DetailProyek($id){

        $post = tb_proyek::join('tb_jenis_bangunan', 'tb_proyek.pry_jenis_bangunan', '=', 'tb_jenis_bangunan.id_jenis')
            ->join('tb_layanan', 'tb_proyek.pry_ly_id', '=', 'tb_layanan.ly_id')
            ->leftjoin('tb_akun', 'tb_proyek.pry_id_akun', '=', 'tb_akun.akun_id')
            ->where('pry_id', '=', $id)->first();

        $file_tambahan = File_Proyek::where('id_proyek', '=', $id)->first();

        $style = proyek_style::join('style', 'proyek_style.id_style', '=', 'style.id_style')
            ->where('id_proyek', '=', $id)->get();

        $hasil_desain = tb_hasil_desain::leftjoin('tb_detail_hasil_desain', 'tb_hasil_desain.desain_id', '=', 'tb_detail_hasil_desain.id_hasil_desain')
            ->where('proyek_id', '=', $id)->get();
            
        $hasil_desain2 = tb_hasil_desain::where('proyek_id', '=', $id)->get();
        
        return view('admin/detail_proyek')->with('post', $post)->with('file_proyek', $file_tambahan)
            ->with('hasil_desain', $hasil_desain)->with('hasil_desain2', $hasil_desain2)->with('style', $style);
    }

    public function AddFileDesain(Request $request)
    {
   
        // move file
        $fileName = $request->nama_file.'.'.$request->file->extension();
        $request->file->move(public_path('asset/file/hasil_desain'), $fileName);

        tb_detail_hasil_desain::where('id_detail_desain', $request->id_detail_desain)
            ->update(['file' => $fileName, 'det_status' => 'dikirim']);

        return redirect('admin/detail_proyek/'.$request->id_proyek);
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

        return redirect('admin/detail_proyek/'.$data->proyek_id);
    }




// pembayaran
    public function Pembayaran(){
        
        //get posts
        $post = pembayaran::join('tb_hasil_desain', 'tb_pembayaran.pby_desain_id', '=', 'tb_hasil_desain.desain_id')
                        ->join('tb_proyek', 'tb_hasil_desain.proyek_id', '=', 'tb_proyek.pry_id')->get();

        //render view with posts
        return view('admin/pembayaran')->with('post', $post);

        // return view('admin/pembayaran');
    }

    public function EditPembayaran(Request $request, $id)
    {
        
        $post = pembayaran::findOrfail($id);

        $post->pby_status = $request->opsi;
        $post->save();

        $id_desain = pembayaran::where('pby_id', $id)->value('pby_desain_id');

        DB::table('tb_hasil_desain')->where('desain_id', $id_desain)->update([
            'status' => 'proses'
        ]);

        DB::table('tb_detail_hasil_desain')->insert([
            'id_hasil_desain' => $id_desain,
            'catatan' => 'catatan awal',
            'det_status' => 'proses',
        ]);

        return redirect('admin/pembayaran');
    }


// pengguna
    public function Pengguna($mode){

        $post = tb_akun::where('level', $mode)->get();
        if(empty($post)){
            back();
        }

        return view('admin/akun')->with('post', $post)->with('mode', $mode);
    }

    public function AddPengguna(Request $request){

        if(!empty($request->file('image'))){

            // save img
            $item = $request->file('image');
            $fileName = $request->mode.'_'.time().'.'.$item->extension();
            $item->move(public_path('asset/images/user'), $fileName);
            
        }else{
            $fileName = "";
        }

        $pass = Hash::make($request->password);
        DB::table('tb_akun')->insert([
            'email' => $request->email,
            'password' => $pass,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'img' => $fileName,
            'level' => $request->mode
        ]);
            


        return redirect('admin/'.$request->mode);
    }

    public function EditPengguna(Request $request){

        if(!empty($request->file('image'))){
            // hapus img
            $imgdel = tb_akun::where('akun_id', $request->id_akun)->value('img');
            if(!empty($imgdel)){
                File::delete('asset/file/hasil_desain/'.$imgdel);
            }

            // save img
            $item = $request->file('image');
            $fileName = $request->mode.'_'.time().'.'.$item->extension();
            $item->move(public_path('asset/images/user'), $fileName);
        }else{
            $fileName = tb_akun::where('akun_id', $request->id_akun)->value('img');
        }

        if(!empty($request->password)){
            $pass = Hash::make($request->password);
            DB::table('tb_akun')->where('akun_id',$request->id_akun)->update([
                'email' => $request->email,
                'password' => $pass,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'img' => $fileName
            ]);

        }else{

            DB::table('tb_akun')->where('akun_id',$request->id_akun)->update([
                'email' => $request->email,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'img' => $fileName
            ]);
        }

        return redirect('admin/'.$request->mode);
    }

    public function DeletePengguna(Request $request){
        tb_akun::where('akun_id', $request->id_akun)->delete();
        
        return redirect('admin/'.$request->mode);
    }


// portofolio
    public function Portofolio(){

    $post = portofolio::join('kota_kab', 'tb_portofolio.pf_alamat', '=', 'kota_kab.id_kota')->get();
    // kota
    $kota = kota::all();

    //image 
    $image = tb_pf_img::all();

        return view('admin/portofolio')->with('post', $post)->with('kota', $kota)->with('img', $image);
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

        }
        
        return redirect('admin/portofolio');
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

        return redirect('admin/portofolio');
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
    

        return redirect('admin/portofolio');
    }


    public function Layanan(){
       
        $post = tb_layanan::all();
        // kota
        $ly_item = tb_relasi_layanan::join('tb_layanan_item', 'tb_relasi_layanan.id_layanan_item', '=', 'tb_layanan_item.ly_item_id')->get();

        //ly_item
        $ly_items = tb_layanan_item::all();

        // ly_item_relasi
        $relasi = tb_relasi_layanan::all();
        
        return view('admin/layanan')->with('post', $post)->with('ly_item', $ly_item)->with('ly_items', $ly_items)->with('relasi', $relasi);
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


        return redirect('admin/layanan');
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

        return redirect('admin/layanan');
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


        return redirect('admin/layanan');
    }

    // item layanan
    public function Item_layanan(){
       
        $post = tb_layanan_item::all();
        
        return view('admin/item_layanan')->with('post', $post);
    }

    public function AddItem_layanan(Request $request){
       
        $this->validate($request, [
            'nama' => 'required',
        ]);

        tb_layanan_item::create([
            'ly_item' => $request->nama
        ]);

        return redirect('admin/item_layanan');
    }

    public function EditItem_layanan(Request $request){
       
        $this->validate($request, [
            'id_item_layanan' => 'required',
            'nama_item' => 'required'
        ]);

        tb_layanan_item::where('ly_item_id', $request->id_item_layanan)->update([
            'ly_item' => $request->nama_item
        ]);

        return redirect('admin/item_layanan');
    }

    public function DeleteItem_layanan(Request $request){
       
        tb_layanan_item::where('ly_item_id', $request->id_item_layanan)->delete();

        return redirect('admin/item_layanan');
    }


    // jenis bangunan
    public function Jenis_bangunan(){
       
        $post = tb_jenis_bangunan::all();
        
        return view('admin/jenis_bangunan')->with('post', $post);
    }

    public function AddJenis_bangunan(Request $request){
       
        $this->validate($request, [
            'nama_jenis' => 'required',
        ]);

        tb_jenis_bangunan::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect('admin/jenis_bangunan');
    }

    public function EditJenis_bangunan(Request $request){
       
        $this->validate($request, [
            'id_jenis' => 'required',
            'nama_jenis' => 'required'
        ]);

        tb_jenis_bangunan::where('id_jenis', $request->id_jenis)->update([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect('admin/jenis_bangunan');
    }

    public function DeleteJenis_bangunan(Request $request){
       
        tb_jenis_bangunan::where('id_jenis', $request->id_jenis)->delete();

        return redirect('admin/jenis_bangunan');
    }

    // kota
    public function Kota(){
       
        $post = kota::all();
        
        return view('admin/kota')->with('post', $post);
    }

    public function AddKota(Request $request){
       
        $this->validate($request, [
            'nama_kota' => 'required',
        ]);

        kota::create([
            'nama_kota' => $request->nama_kota
        ]);

        return redirect('admin/kota');
    }

    public function EditKota(Request $request){
       
        $this->validate($request, [
            'id_kota' => 'required',
            'nama_kota' => 'required'
        ]);

        kota::where('id_kota', $request->id_kota)->update([
            'nama_kota' => $request->nama_kota
        ]);

        return redirect('admin/kota');
    }

    public function DeleteKota(Request $request){
       
        kota::where('id_kota', $request->id_kota)->delete();

        return redirect('admin/kota');
    }

    // style
    public function Style(){
       
        $post = Style::all();
        
        return view('admin/style')->with('post', $post);
    }

    public function AddStyle(Request $request){
       
        $this->validate($request, [
            'nama_style' => 'required',
            'img_style' => 'required'
        ]);

        // move new file
        $fileName = time().'.'.$request->file('img_style')->extension();
        $request->file('img_style')->move(public_path('asset/images/style'), $fileName);

        // input ke db
        Style::create([
            'nama_style' => $request->nama_style,
            'img_style' => $fileName
        ]);

        return redirect('admin/style');
    }

    public function EditStyle(Request $request){
       
        $this->validate($request, [
            'nama_style' => 'required',
            'img_style' => 'required'
        ]);
        // Delete img
        $imgg = Style::where('id_style', $request->id_style)->value('img_style');
        if(!empty($imgg)){
            File::delete(public_path('asset/images/style/'.$imgg));
        }

        // move new file
        $fileName = time().'.'.$request->file('img_style')->extension();
        $request->file('img_style')->move(public_path('asset/images/style'), $fileName);


        // input ke db
        Style::where('id_style', $request->id_style)->update([
            'nama_style' => $request->nama_style,
            'img_style' => $fileName
        ]);

        return redirect('admin/style');
    }

    public function DeleteStyle(Request $request){
       
        // Delete img
        $imgg = Style::where('id_style', $request->id_style)->value('img_style');
        if(!empty($imgg)){
            File::delete(public_path('asset/images/style/'.$imgg));
        }

        Style::where('id_style', $request->id_style)->delete();

        return redirect('admin/style');
    }


}
