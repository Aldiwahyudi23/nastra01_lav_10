<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Http\Controllers\Controller;
use App\Models\Anggaran;
use App\Models\Pemasukan;
use App\Models\Pengajuan;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\New_;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pengeluaran_semua = Pengeluaran::all();
        $data_pengeluaran_pinjaman = Pengeluaran::where('anggaran_id', 3)->where('anggota_id', Auth::user()->id)->get();
        $program = Anggaran::Find(3);
        $cek_pengajuan = Pengajuan::where('kategori', 'Pinjaman')->where('anggota_id', Auth::id())->count();
        $cek_pengajuan_proses = Pengajuan::where('anggota_id', Auth::id())->get();
        $cek_pengeluaran_pinjaman_user = Pengeluaran::where('anggaran_id', 3)->where('anggota_id', Auth::id())->where('status', 'Nunggak')->count();
        $cek_pengeluaran_pinjaman = Pengeluaran::where('anggaran_id', 3)->where('status', 'Nunggak')->count();

        // Data Anggaran
        $data_anggaran = Anggaran::all();
        $data_anggaran_max_pinjaman = Anggaran::find(3);
        // cek data jumlah pemasukan
        $cek_semua_pemasukan = Pemasukan::where('kategori', 'Kas')->sum('jumlah');
        $cek_pemasukan_2 = $cek_semua_pemasukan / 2; // Membagi jumlah semua pemasukan
        $tahap_1 = $cek_pemasukan_2 * 90 / 100; // Menghitung Jumlah anggaran pinjaman dari hasil pembagian 2,
        $cek_total_pinjaman = $tahap_1 / 2; // Menghitung total Anggaran
        $jatah = $cek_total_pinjaman * $data_anggaran_max_pinjaman->persen / 100; //Jath Persenan di ambil dari data anggaran
        // Data Dana Darurat
        $dana_darurat = Pengeluaran::where('anggaran_id', 1)->get();
        $dana_amal = Pengeluaran::where('anggaran_id', 2)->get();
        $dana_pinjam = Pengeluaran::where('anggaran_id', 3)->get();
        $dana_usaha = Pengeluaran::where('anggaran_id', 4)->get();
        $dana_acara = Pengeluaran::where('anggaran_id', 5)->get();
        $dana_lain = Pengeluaran::where('anggaran_id', 6)->get();

        return view('pengeluaran.index', compact('data_pengeluaran_semua', 'data_pengeluaran_pinjaman', 'program', 'cek_pengajuan', 'cek_pengajuan_proses', 'cek_pengeluaran_pinjaman_user', 'cek_pengeluaran_pinjaman', 'cek_total_pinjaman', 'jatah', 'data_anggaran', 'data_anggaran_max_pinjaman', 'dana_darurat', 'dana_amal', 'dana_pinjam', 'dana_usaha', 'dana_acara', 'dana_lain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_pengeluaran_semua = Pengeluaran::all();
        $data_pengeluaran_pinjaman = Pengeluaran::where('anggaran_id', 3)->where('anggota_id', Auth::user()->id)->get();
        $program = Anggaran::Find(3);
        $cek_pengajuan = Pengajuan::where('kategori', 'Pinjaman')->where('anggota_id', Auth::id())->count();
        $cek_pengajuan_proses = Pengajuan::where('anggota_id', Auth::id())->get();
        $cek_pengeluaran_pinjaman_user = Pengeluaran::where('anggaran_id', 3)->where('anggota_id', Auth::id())->where('status', 'Nunggak')->count();
        $cek_pengeluaran_pinjaman = Pengeluaran::where('anggaran_id', 3)->where('status', 'Nunggak')->count();

        // Data Anggaran
        $data_anggaran = Anggaran::all();
        $data_anggaran_max_pinjaman = Anggaran::find(3);
        // cek data jumlah pemasukan
        $cek_semua_pemasukan = Pemasukan::where('kategori', 'Kas')->sum('jumlah');
        $cek_pemasukan_2 = $cek_semua_pemasukan / 2; // Membagi jumlah semua pemasukan
        $tahap_1 = $cek_pemasukan_2 * 90 / 100; // Menghitung Jumlah anggaran pinjaman dari hasil pembagian 2,
        $cek_total_pinjaman = $tahap_1 / 2; // Menghitung total Anggaran
        $jatah = $cek_total_pinjaman * $data_anggaran_max_pinjaman->persen / 100; //Jath Persenan di ambil dari data anggaran
        // Data Dana Darurat
        $dana_darurat = Pengeluaran::where('anggaran_id', 1)->get();
        $dana_amal = Pengeluaran::where('anggaran_id', 2)->get();
        $dana_pinjam = Pengeluaran::where('anggaran_id', 3)->get();
        $dana_usaha = Pengeluaran::where('anggaran_id', 4)->get();
        $dana_acara = Pengeluaran::where('anggaran_id', 5)->get();
        $dana_lain = Pengeluaran::where('anggaran_id', 6)->get();

        return view('pengeluaran.form_input_pengeluaran', compact('data_pengeluaran_semua', 'data_pengeluaran_pinjaman', 'program', 'cek_pengajuan', 'cek_pengajuan_proses', 'cek_pengeluaran_pinjaman_user', 'cek_pengeluaran_pinjaman', 'cek_total_pinjaman', 'jatah', 'data_anggaran', 'data_anggaran_max_pinjaman', 'dana_darurat', 'dana_amal', 'dana_pinjam', 'dana_usaha', 'dana_acara', 'dana_lain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'anggaran_id' => 'required',
                'jumlah' => 'required|numeric',
                'keterangan' => 'required',
            ],
            [
                'anggaran_id.required' => 'anggaran kedah di pilih',
                'jumlah.required' => 'Nominal kedah di isi',
                'jumlah.numeric' => 'Nominal teu kengeng kangge titik',
                'keterangan.required' => 'keterangan kedah di isi',
            ]
        );

        $data_pengeluaran = new Pengeluaran();
        $data_pengeluaran->jumlah = $request->jumlah;
        $data_pengeluaran->anggaran_id = $request->anggaran_id;
        $data_pengeluaran->anggota_id = Auth::user()->id;
        $data_pengeluaran->alasan = $request->keterangan;
        $data_pengeluaran->tanggal = Carbon::now();
        $data_pengeluaran->save();

        return redirect()->back()->with('sukses', 'Dana Anggaran anu di input atos masuk data, mangga manpaatkeun anggaranna ');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store_pinjaman(Request $request)
    {
        $request->validate(
            [
                'anggaran_id' => 'required',
                'jumlah' => 'required|numeric',
                'keterangan' => 'required',
            ],
            [
                'anggaran_id.required' => 'anggaran kedah di pilih',
                'jumlah.required' => 'Nominal kedah di isi',
                'jumlah.numeric' => 'Nominal teu kengeng kangge titik',
                'keterangan.required' => 'keterangan kedah di isi',
            ]
        );

        $data_pengeluaran = new Pengeluaran();
        $data_pengeluaran->jumlah = $request->jumlah;
        $data_pengeluaran->anggaran_id = $request->anggaran_id;
        $data_pengeluaran->alasan = $request->keterangan;
        $data_pengeluaran->tanggal = Carbon::now();
        $data_pengeluaran->save();

        return redirect()->back()->with('sukses', 'Dana Anggaran anu di input atos masuk data, mangga manpaatkeun anggaranna ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::find($id);

        return view('pengeluaran.show', compact('data_pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::find($id);
        $data_anggaran = Anggaran::all();


        return view('pengeluaran.edit', compact('data_pengeluaran', 'data_anggaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate(
            [
                'anggaran_id' => 'required',
                'jumlah' => 'required|numeric',
                'keterangan' => 'required',
            ],
            [
                'anggaran_id.required' => 'anggaran kedah di pilih',
                'jumlah.required' => 'Nominal kedah di isi',
                'jumlah.numeric' => 'Nominal teu kengeng kangge titik',
                'keterangan.required' => 'keterangan kedah di isi',

            ]
        );
        $data_pengeluaran = Pengeluaran::find($id);
        $data_pengeluaran->jumlah = $request->jumlah;
        $data_pengeluaran->anggaran_id = $request->anggaran_id;
        $data_pengeluaran->alasan = $request->keterangan;

        $data_pengeluaran->update();

        return redirect()->back()->with('infoes', 'Data pengeluaran atos di rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::find($id);

        $data_pengeluaran->delete();

        return redirect()->back()->with('kuning', 'Data Parantos di hapus tina disimpen dina sampah )');
    }
    public function trash()
    {
        $data_pengeluaran = Pengeluaran::onlyTrashed()->get();

        return view('pengeluaran.trash', compact('data_pengeluaran'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::withTrashed()->findorfail($id);
        $data_pengeluaran->restore();
        return redirect()->back()->with('infoes', 'Data pengeluaran atos di kembalikeun deui tina sampah');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::withTrashed()->findorfail($id);

        $data_pengeluaran->forceDelete();
        return redirect()->back()->with('kuning', 'Data pengeluaran parantos di hapus dina sampah');
    }
}
