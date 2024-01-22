<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HalamanUser;
use App\Http\Controllers\HalamanAdmin;
use App\Http\Controllers\HalamanCS;
use App\Http\Controllers\AuthController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::get('/masuk', [AuthController::class, 'login'])->name('masuk');
Route::post('/masuk', [AuthController::class, 'Login_action']);
Route::get('/cekRole', [AuthController::class, 'Role']);

Route::get('/daftar', [AuthController::class, 'daftar']);
Route::put('/daftars', [AuthController::class, 'Daftar_action']);


// logout
Route::get('/keluar', [AuthController::class, 'Logout']);







// pelanggan
Route::get('/', [HalamanUser::class, 'index']);
// Route::get('/masuk', [HalamanUser::class, 'Login'])->middleware('auth');
// Route::get('/daftar', [HalamanUser::class, 'Daftar'])->middleware('auth');

// proyek
Route::get('/proyek', [HalamanUser::class, 'Proyek']);
Route::put('/tambah_proyek', [HalamanUser::class, 'AddProyek']);
Route::get('/del_proyek/{id}', [HalamanUser::class, 'DeleteProyek']);
Route::put('/edit_proyek', [HalamanUser::class, 'EditProyek']);

// pengerjaan proyek
Route::get('/pengerjaan_proyek/{id}', [HalamanUser::class, 'Pengerjaan_Proyek']);
Route::put('/bayar', [HalamanUser::class, 'Pembayaran']);
// revisi
Route::put('/pengerjaan_proyek/revisi', [HalamanUser::class, 'Revisi']);

// acc
Route::get('/acc/{id_hasil}/{id_detail}', [HalamanUser::class, 'AccDesain']);






Route::get('/layanan', [HalamanUser::class, 'Layanan']);


Route::get('/detail_proyek', [HalamanUser::class, 'Detail_Proyek']);

Route::get('/pengerjaan_proyek', [HalamanUser::class, 'Pengerjaan_Proyek']);

Route::get('/portofolio', [HalamanUser::class, 'Portofolio']);

Route::get('/detail_portofolio/{id}', [HalamanUser::class, 'Detail_portofolio']);

Route::get('/kontak', [HalamanUser::class, 'Kontak']);




// Route::view('/dd', 'test', ['nama' => 'tegar']);

// admin
Route::prefix('admin')->group(function(){
    Route::get('/', [HalamanAdmin::class, 'Dashboard'])->middleware(['auth', 'OnlyAdmin']);
    
// proyek 
    Route::get('/proyek/{mode}', [HalamanAdmin::class, 'Proyek'])->middleware(['auth', 'OnlyAdmin']);
    Route::get('/proyek', [HalamanAdmin::class, 'Proyek'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/proyek/tambah', [HalamanAdmin::class, 'TambahProyek'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/proyek/delete', [HalamanAdmin::class, 'HapusProyek'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/proyek/edit', [HalamanAdmin::class, 'EditProyek'])->middleware(['auth', 'OnlyAdmin']);


    Route::get('/detail_proyek/{id}', [HalamanAdmin::class, 'DetailProyek'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/detail_proyek/AddFile', [HalamanAdmin::class, 'AddFileDesain'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/detail_proyek/DeleteFile', [HalamanAdmin::class, 'DeleteFileDesain'])->middleware(['auth', 'OnlyAdmin']);


// pembayaran
    Route::get('/pembayaran', [HalamanAdmin::class, 'Pembayaran'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/pembayaran/{id}', [HalamanAdmin::class, 'EditPembayaran'])->middleware(['auth', 'OnlyAdmin']);

// pengguna
    Route::get('/akun/{mode}', [HalamanAdmin::class, 'Pengguna'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/akun/{mode}/tambah', [HalamanAdmin::class, 'Addpengguna'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/akun/{mode}/edit', [HalamanAdmin::class, 'EditPengguna'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/akun/{mode}/hapus', [HalamanAdmin::class, 'DeletePengguna'])->middleware(['auth', 'OnlyAdmin']);
    
    Route::get('/portofolio', [HalamanAdmin::class, 'Portofolio'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/portofolio/tambah', [HalamanAdmin::class, 'AddPortofolio'])->middleware(['auth', 'OnlyAdmin']);
    Route::get('/portofolio/hapus/{id}', [HalamanAdmin::class, 'DeletePortofolio'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/portofolio/edit', [HalamanAdmin::class, 'EditPortofolio'])->middleware(['auth', 'OnlyAdmin']);

    Route::get('/layanan', [HalamanAdmin::class, 'Layanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/layanan/tambah', [HalamanAdmin::class, 'AddLayanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/layanan/edit', [HalamanAdmin::class, 'EditLayanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/layanan/hapus', [HalamanAdmin::class, 'HapusLayanan'])->middleware(['auth', 'OnlyAdmin']);

    Route::get('/item_layanan', [HalamanAdmin::class, 'Item_layanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/item_layanan/tambah', [HalamanAdmin::class, 'AddItem_layanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/item_layanan/edit', [HalamanAdmin::class, 'EditItem_layanan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/item_layanan/hapus', [HalamanAdmin::class, 'DeleteItem_layanan'])->middleware(['auth', 'OnlyAdmin']);

    Route::get('/jenis_bangunan', [HalamanAdmin::class, 'Jenis_bangunan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/jenis_bangunan/tambah', [HalamanAdmin::class, 'AddJenis_bangunan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/jenis_bangunan/edit', [HalamanAdmin::class, 'EditJenis_bangunan'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/jenis_bangunan/hapus', [HalamanAdmin::class, 'DeleteJenis_bangunan'])->middleware(['auth', 'OnlyAdmin']);

    Route::get('/style', [HalamanAdmin::class, 'Style'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/style/tambah', [HalamanAdmin::class, 'AddStyle'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/style/edit', [HalamanAdmin::class, 'EditStyle'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/style/hapus', [HalamanAdmin::class, 'DeleteStyle'])->middleware(['auth', 'OnlyAdmin']);

    Route::get('/kota', [HalamanAdmin::class, 'Kota'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/kota/tambah', [HalamanAdmin::class, 'AddKota'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/kota/edit', [HalamanAdmin::class, 'EditKota'])->middleware(['auth', 'OnlyAdmin']);
    Route::put('/kota/hapus', [HalamanAdmin::class, 'DeleteKota'])->middleware(['auth', 'OnlyAdmin']);

});



// CS
Route::prefix('cs')->group(function(){
    Route::get('/', [HalamanCS::class, 'Dashboard'])->middleware('auth');
    
// proyek 
    Route::get('/proyek/{mode}', [HalamanCS::class, 'Proyek'])->middleware('auth');
    Route::get('/proyek', [HalamanCS::class, 'Proyek'])->middleware('auth');
    Route::put('/proyek/tambah', [HalamanCS::class, 'TambahProyek'])->middleware('auth');
    Route::put('/proyek/delete', [HalamanCS::class, 'HapusProyek'])->middleware('auth');

    Route::get('/detail_proyek/{id}', [HalamanCS::class, 'DetailProyek'])->middleware('auth');

    Route::put('/detail_proyek/AddFile', [HalamanCS::class, 'AddFileDesain'])->middleware('auth');
    Route::put('/detail_proyek/DeleteFile', [HalamanCS::class, 'DeleteFileDesain'])->middleware('auth');





// pembayaran
    Route::get('/pembayaran', [HalamanCS::class, 'Pembayaran'])->middleware('auth');
    Route::put('/pembayaran/{id}', [HalamanCS::class, 'EditPembayaran'])->middleware('auth');





    Route::get('/pelanggan', [HalamanCS::class, 'Data_Pelanggan'])->middleware('auth');
    Route::get('/cs', [HalamanCS::class, 'Data_CS'])->middleware('auth');
    Route::get('/admin', [HalamanCS::class, 'Data_Admin'])->middleware('auth');
    
    Route::get('/portofolio', [HalamanCS::class, 'Portofolio'])->middleware('auth');
    Route::put('/portofolio/tambah', [HalamanCS::class, 'AddPortofolio'])->middleware('auth');
    Route::get('/portofolio/hapus/{id}', [HalamanCS::class, 'DeletePortofolio'])->middleware('auth');

    Route::put('/portofolio/edit', [HalamanCS::class, 'EditPortofolio'])->middleware('auth');


    Route::get('/layanan', [HalamanCS::class, 'Layanan'])->middleware('auth');
    Route::put('/layanan/tambah', [HalamanCS::class, 'AddLayanan'])->middleware('auth');
    Route::put('/layanan/edit', [HalamanCS::class, 'EditLayanan'])->middleware('auth');
    Route::put('/layanan/hapus', [HalamanCS::class, 'HapusLayanan'])->middleware('auth');

    Route::get('/item-paket', [HalamanCS::class, 'Item_paket'])->middleware('auth');


});


Auth::routes();

