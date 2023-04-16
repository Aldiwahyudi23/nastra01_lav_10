<?php

namespace App\Http\Controllers;

use App\Models\BayarPinjaman;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Pengeluaran;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BayarPinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'pembayaran' => 'required',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
        ], [
            'anggota_id.required' => 'Anggota kedah di pilih',
            'pembayaran.required' => 'Pembayaran kedah di pilih',
            'jumlah.required' => 'Nominal kedah di isi',
            'jumlah.numeric' => 'Nominal teu kengeng kangge titik',
            'keterangan.required' => 'keterangan kedah di isi',
        ]);

        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'bukti-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/bukti'), $nama);
        }

        $data_pemasukan = new BayarPinjaman();
        $data_pemasukan->anggota_id = $request->anggota_id;
        $data_pemasukan->jumlah = $request->jumlah;
        $data_pemasukan->pembayaran = $request->pembayaran;
        $data_pemasukan->pengeluaran_id = $request->pengeluaran_id;
        $data_pemasukan->keterangan = $request->keterangan;
        $data_pemasukan->tanggal = $request->tanggal;
        $data_pemasukan->pengurus_id = Auth::user()->id;

        if ($request->foto) {
            $data_pemasukan->foto          = "/img/bukti/$nama";
        }
        if ($request->foto1) {
            $data_pemasukan->foto          = $request->foto1;
        }
        // Kanggo send notifikasi
        $ketua = User::where('role', 'Ketua')->get();
        $seker = User::where('role', 'Admin')->get();
        $penasehat = User::where('role', 'Penasehat')->get();
        $user = User::find(Auth::user()->id);
        $nama_pengaju = User::find($request->anggota_id);

        $project = [
            'greeting' => 'Alhamdullilah',
            'body' => 'Pengajuan Pembayaran Pinjaman Atos di Konfirmasi ku ' . $user->name . ' Sesuai data nu di handap, Mangga cek deui nya bilih aya nu lepat',
            'nama' => $nama_pengaju->name,
            'kategori' => $request->kategori,
            'pembayaran' => $request->pembayaran,
            'jumlah' => 'Rp ' . number_format($request->jumlah, 2, ',', '.'),
            'tanggal' => $request->tanggal,
            'thanks' => 'Hatur Nuhun Pisan Atos Berpartisipasi kana PROGRAM ieu',
            'actionText' => 'Tinggal',
            'actionURL' => url('/'),
            'id' => 57
        ];
        $pengurus = [
            'greeting' => 'HI DULLURRR',
            'body' => 'Aya Data Bayar Pinjaman Nu Masuk Atos di Konfirmasi ku ' . $user->name . ' Sesuai data nu di handap, Mangga cek deui nya bilih aya nu lepat',
            'nama' => $nama_pengaju->name,
            'kategori' => $request->kategori,
            'pembayaran' => $request->pembayaran,
            'jumlah' => 'Rp ' . number_format($request->jumlah, 2, ',', '.'),
            'tanggal' => $request->tanggal,
            'thanks' => 'Bismillah Semoga lancar jaya ahhhh... gas',
            'actionText' => 'Cek di web',
            'actionURL' => url('/'),
            'id' => 57
        ];

        Notification::sendnow($nama_pengaju, new EmailNotification($project));
        Notification::sendnow($seker, new EmailNotification($pengurus));
        Notification::sendnow($ketua, new EmailNotification($pengurus));

        $data_pemasukan->save();
        //jika pembayaran Lunas Keterangan dina data pengeluaran berubah
        // Sekalian Edit pengeluaran
        $data_pinjaman = Pengeluaran::find($request->pengeluaran_id);
        $jumlahna = $request->sekertaris + $request->jumlah;

        if ($jumlahna >= $data_pinjaman->jumlah) {
            $data_pengeluaran = Pengeluaran::find($request->pengeluaran_id);
            $data_pengeluaran->status = "Lunas";
            $data_pengeluaran->update();
        }
        // jika ada pengajuan ID hapus
        if ($request->pengajuan_id) {
            $pengajuan = Pengajuan::find($request->pengajuan_id);
            $pengajuan->delete();


            return redirect('/pengajuans/kas')->with('sukses', 'Wihhhh mantappp hatur nuhun atos ngaKONFIRMASI pengajuan pemabyaran KAS keluarga. Lancar selalu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_setor = Pengeluaran::orderByRaw('created_at DESC')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();

        $cek_pengajuan = Pengajuan::where('kategori', 'Bayar_Pinjaman')->count();
        $bayar_pinjam = BayarPinjaman::where('pengeluaran_id', $id)->get();
        $total_bayar_pinjam = BayarPinjaman::where('pengeluaran_id', $id)->sum('jumlah');

        $data_pinjaman = Pengeluaran::find($id);

        return view('pemasukan.bayar_pinjaman.form_bayar_pinjam', compact('data_pinjaman', 'data_setor', 'data_anggota', 'bayar_pinjam', 'total_bayar_pinjam', 'cek_pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data_bayar_pinjaman = BayarPinjaman::find($id);

        return view('pemasukan.bayar_pinjaman.show', compact('data_bayar_pinjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BayarPinjaman $bayarPinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BayarPinjaman $bayarPinjaman)
    {
        //
    }
}
