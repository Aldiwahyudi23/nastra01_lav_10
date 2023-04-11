<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AsetPinjamController;
use App\Http\Controllers\BayarPinjamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoleController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Data Role
Route::resource('role', RoleController::class);
Route::get('/roles/trash/', [RoleController::class, 'trash'])->name('role.trash');
Route::post('/roles/kill/{id}', [RoleController::class, 'kill'])->name('role.kill');
Route::get('/roles/restore/{id}', [RoleController::class, 'restore'])->name('role.restore');

// Data Program
Route::resource('program', ProgramController::class);
Route::get('/programs/trash/', [ProgramController::class, 'trash'])->name('program.trash');
Route::post('/programs/kill/{id}', [ProgramController::class, 'kill'])->name('program.kill');
Route::get('/programs/restore/{id}', [ProgramController::class, 'restore'])->name('program.restore');
// Data Anggaran
Route::resource('anggaran', AnggaranController::class);
Route::get('/anggarans/trash/', [AnggaranController::class, 'trash'])->name('anggaran.trash');
Route::post('/anggarans/kill/{id}', [AnggaranController::class, 'kill'])->name('anggaran.kill');
Route::get('/anggarans/restore/{id}', [AnggaranController::class, 'restore'])->name('anggaran.restore');
//Data Asset
Route::resource('aset', AsetController::class);
Route::get('/asets/trash/', [AsetController::class, 'trash'])->name('aset.trash');
Route::post('/asets/kill/{id}', [AsetController::class, 'kill'])->name('aset.kill');
Route::get('/asets/restore/{id}', [AsetController::class, 'restore'])->name('aset.restore');
//Data Asset Pinjam
Route::resource('asetpinjam', AsetPinjamController::class);
Route::get('/asets/pinjam/detail/{id}', [AsetPinjamController::class, 'detail'])->name('aset.pinjam.detail');
Route::get('/asets/pinjam/trash/', [AsetPinjamController::class, 'trash'])->name('aset.pinjam.trash');
Route::post('/asets/pinjam/kill/{id}', [AsetPinjamController::class, 'kill'])->name('aset.pinjam.kill');
Route::get('/asets/pinjam/restore/{id}', [AsetPinjamController::class, 'restore'])->name('aset.pinjam.restore');
// Pemasukan
Route::resource('pemasukan', PemasukanController::class);
Route::get('/pemasukans/trash/', [PemasukanController::class, 'trash'])->name('pemasukan.trash');
Route::post('/pemasukans/kill/{id}', [PemasukanController::class, 'kill'])->name('pemasukan.kill');
Route::get('/pemasukans/restore/{id}', [PemasukanController::class, 'restore'])->name('pemasukan.restore');
Route::get('/pemasukans/detail/kas/{id}', [PemasukanController::class, 'detail_anggota_kas'])->name('detail.anggota.kas');
Route::get('/pemasukans/detail/tabungan/{id}', [PemasukanController::class, 'detail_anggota_tabungan'])->name('detail.anggota.tabungan');
Route::get('/pemasukans/tambah/tabungan/{id}', [PemasukanController::class, 'tambah_anggota_tabungan'])->name('tambah.anggota.tabungan');
// pengajuan
Route::resource('pengajuan', PengajuanController::class);
Route::get('/pengajuans/trash/', [PengajuanController::class, 'trash'])->name('pengajuan.trash');
Route::post('/pengajuans/kill/{id}', [PengajuanController::class, 'kill'])->name('pengajuan.kill');
Route::get('/pengajuans/restore/{id}', [PengajuanController::class, 'restore'])->name('pengajuan.restore');
Route::get('/pengajuans/kas', [PengajuanController::class, 'index_pemasukan'])->name('table-pengajuan-kas');
Route::get('/pengajuans/tabungan', [PengajuanController::class, 'index_tabungan'])->name('table-pengajuan-tabungan');
Route::get('/pengajuans/pinjam', [PengajuanController::class, 'index_pinjam'])->name('table-pengajuan-pinjaman');
Route::get('/pengajuans/bayar', [PengajuanController::class, 'index_bayar_pinjam'])->name('table-pengajuan-bayar_pinjaman');
Route::get('/pengajuans/laporan/{id}', [PengajuanController::class, 'laporan_pinjaman'])->name('pengajuan.laporan');
Route::post('/pengajuans/laporan/{id}', [PengajuanController::class, 'kirim_laporan_pinjaman'])->name('kirim_pengajuan.laporan');

// Pengeluaran
Route::resource('pengeluaran', PengeluaranController::class);
Route::get('/pengeluarans/trash/', [PengeluaranController::class, 'trash'])->name('pengeluaran.trash');
Route::post('/pengeluarans/kill/{id}', [PengeluaranController::class, 'kill'])->name('pengeluaran.kill');
Route::get('/pengeluarans/restore/{id}', [PengeluaranController::class, 'restore'])->name('pengeluaran.restore');
Route::post('/pengeluarans/store/pinjaman', [PengeluaranController::class, 'store_pinjaman'])->name('store_pinjaman');

//Data Asset
Route::resource('pinjaman', BayarPinjamanController::class);
Route::get('/bayar/pinjaman/trash/', [ABayarPinjamanController::class, 'trash'])->name('bayar.pinjaman.trash');
Route::post('/bayar/pinjaman/kill/{id}', [ABayarPinjamanController::class, 'kill'])->name('bayar.pinjaman.kill');
Route::get('/bayar/pinjaman/restore/{id}', [ABayarPinjamanController::class, 'restore'])->name('bayar.pinjaman.restore');


require __DIR__ . '/auth.php';
