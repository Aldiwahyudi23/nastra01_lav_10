<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use App\Models\Pengeluaran;
use App\Models\User;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengajuanController extends Controller
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
            'pembayaran' => 'required',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
        ], [
            'pembayaran.required' => 'Pembayaran kedah di pilih',
            'jumlah.required' => 'Nominal kedah di isi',
            'jumlah.numeric' => 'Nominal teu kengeng kangge titik',
            'keterangan.required' => 'keterangan kedah di isi sareng Pami tombil masih teu tiasa di klik mangga di Refresh heula browserna',
        ]);

        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'bukti-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/bukti'), $nama);
        }
        $tanggal = Carbon::now();

        $data = new Pengajuan();
        $data->pembayaran = $request->pembayaran;
        $data->jumlah = $request->jumlah;
        $data->keterangan = $request->keterangan;
        $data->kategori = $request->kategori;
        $data->tanggal = $tanggal;
        $data->status = "Proses";
        $data->anggota_id = $request->anggota_id;
        if ($request->foto) {
            $data->foto          = "/img/bukti/$nama";
        }

        //jika pengajuan bayar pinjaman di tambahkan data sebagai berikut
        if ($request->kategori == "Bayar_Pinjaman") {
            $data->pengeluaran_id = $request->pengeluaran_id;
            $data->sekertaris = $request->sekertaris;
            $data->lama = $request->lama;
        }

        $bendahara = User::find(4);
        $seker = User::where('role', 'Sekertaris')->get();
        $penasehat = User::find(6);
        $user = User::find(Auth::user()->id);
        $nama_pengaju = User::find($request->anggota_id);

        $project = [
            'greeting' => 'Sampurasun',
            'body' => 'Pengajuan nuju di proses, Antosan sampe pengurus ngaKonfirmasi.',
            'nama' => $nama_pengaju->name,
            'kategori' => $request->kategori,
            'pembayaran' => $request->pembayaran,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'thanks' => 'Hatur Nuhun Pisan Atos Berpartisipasi kana PROGRAM ieu',
            'actionText' => 'Tinggal',
            'actionURL' => url('/'),
            'id' => 57
        ];

        $nama_pengaju->notify(new EmailNotification($project));
        $bendahara->notify(new EmailNotification($project));
        $penasehat->notify(new EmailNotification($project));


        $data->save();

        return redirect()->back()->with('sukses', 'Horeeeeeee pengajuan pembayaran atos masuk, nuju di proses heula. Nuhun atos berpartisipasi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $data_pengajuan = Pengajuan::Find($id);
        return view('pengajuan.show', compact('data_pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);

        $data_pengajuan = Pengajuan::find($id);
        $data_pengajuan_semua = Pengajuan::all();
        $data_anggota = User::all();
        return view('pengajuan.edit', compact('data_pengajuan', 'data_pengajuan_semua', 'data_anggota'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function laporan_pinjaman($id)
    {
        $id = Crypt::decrypt($id);

        $data_pengajuan = Pengajuan::find($id);
        $data_pengajuan_semua = Pengajuan::all();
        $data_anggota = User::all();
        return view('pengajuan.form_konfirmasi_pinjaman', compact('data_pengajuan', 'data_pengajuan_semua', 'data_anggota'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        if ($request->kategori == "Pinjaman") { //request dari data pinjaman
            $request->validate(
                [
                    'bendahara' => 'required',
                    'jumlah' => 'required|numeric|',
                    'anggota_id' => 'required',
                    'keterangan' => 'required',
                    'pembayaran' => 'required',
                ],
                [
                    'sekertaris.required' => 'Laporan kedah di isi',
                    'jumlah.required' => 'Nominal kedah di isi',
                    'jumlah.numeric' => 'Nominal kedah di isi ku Angka',
                    'anggota_id.required' => 'anggota_id kedah di isi',
                    'keterangan.required' => 'keterangan kedah di isi sareng Pami tombil masih teu tiasa di klik mangga di Refresh heula browserna',
                    'pembayaran.required' => 'keterangan kedah di isi',
                ]
            );
        } else {
            $request->validate(
                [
                    'jumlah' => 'required|numeric',
                    'anggota_id' => 'required',
                    'keterangan' => 'required',
                    'pembayaran' => 'required',
                ],
                [
                    'jumlah.required' => 'Nominal kedah di isi',
                    'jumlah.numeric' => 'Nominal kedah di isi ku Angka',
                    'anggota_id.required' => 'anggota_id kedah di isi',
                    'keterangan.required' => 'keterangan kedah di isi sareng Pami tombil masih teu tiasa di klik mangga di Refresh heula browserna',
                    'pembayaran.required' => 'keterangan kedah di isi',
                ]
            );
        }
        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'bukti-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/bukti'), $nama);
        }
        $data_pengajuan = Pengajuan::Find($id);

        $data_pengajuan->anggota_id = $request->anggota_id;
        $data_pengajuan->jumlah = $request->jumlah;
        $data_pengajuan->pembayaran = $request->pembayaran;
        $data_pengajuan->kategori = $request->kategori;
        $data_pengajuan->keterangan = $request->keterangan;
        if ($request->foto) {
            $data_pengajuan->foto = "/img/bukti/$nama";
        }
        if ($request->kategori == "Pinjaman") { //request dari data pinjaman
            $data_pengajuan->keterangan = $request->bendahara;
            $data_pengajuan->keterangan = $request->sekertaris;
            $data_pengajuan->keterangan = $request->ketua;
        }

        $data_pengajuan->update();

        return redirect()->back()->with('infoes', 'Wihhhh mantappp data atos di gentos');
    }
    /**
     * Update the specified resource in storage.
     */
    public function kirim_laporan_pinjaman(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        if (Auth::user()->role == "Bendahara") {
            $request->validate(
                [
                    'bendahara' => 'required',
                ],
                [
                    'bendahara.required' => 'Laporan kedah di isi',
                ]
            );
            $data_pengajuan = Pengajuan::Find($id);
            $data_pengajuan->bendahara = $request->bendahara;
            $data_pengajuan->update();
        }
        if (Auth::user()->role == "Sekertaris") {
            $request->validate(
                [
                    'sekertaris' => 'required',
                ],
                [
                    'sekertaris.required' => 'Laporan kedah di isi',
                ]
            );
            $data_pengajuan = Pengajuan::Find($id);
            $data_pengajuan->sekertaris = $request->sekertaris;
            $data_pengajuan->update();
        }
        if (Auth::user()->role == "Ketua") {
            $request->validate(
                [
                    'ketua' => 'required',
                    'status' => 'required',
                ],
                [
                    'ketua.required' => 'Laporan kedah di isi',
                    'status.required' => 'Konfirmasi kedah di isi kedah di isi',
                ]
            );
            if ($request->status == "Tunda") {
                $data_pengajuan = Pengajuan::Find($id);
                $data_pengajuan->ketua = $request->ketua;
                $data_pengajuan->status = $request->status;
                $data_pengajuan->update();
            } elseif ($request->status == "Nunggak") {

                $data_pengajuan = new Pengeluaran();
                $data_pengajuan->anggota_id = $request->anggota_id;
                $data_pengajuan->jumlah = $request->jumlah;
                $data_pengajuan->anggaran_id = 3;
                $data_pengajuan->alasan = $request->keterangan;
                $data_pengajuan->tanggal = $request->tanggal;
                $data_pengajuan->bendahara = $request->bendahara;
                $data_pengajuan->sekertaris = $request->sekertaris;
                $data_pengajuan->ketua = $request->ketua;
                $data_pengajuan->status = $request->status;

                if ($request->pengajuan_id) {
                    $pengajuan = Pengajuan::find($request->pengajuan_id);
                    $pengajuan->delete();
                }

                $data_pengajuan->save();

                return redirect('pengajuans/pinjam')->with('sukses', 'Pengajuan Pinjaman atos di setujui nuhun ');
            }
        }

        return redirect()->back()->with('infoes', 'hatur nuhun atos bikin laporan, Laporan atos di simpen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengajuan = Pengajuan::find($id);

        $data_pengajuan->delete();

        return redirect()->back()->with('kuning', 'Data Parantos di hapus tina disimpen dina sampah )');
    }
    public function trash()
    {
        $data_pengajuan = Pengajuan::onlyTrashed()->get();

        return view('pengajuan.trash', compact('data_pengajuan'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengajuan = Pengajuan::withTrashed()->findorfail($id);
        $data_pengajuan->restore();
        return redirect()->back()->with('infoes', 'Data pengajuan atos di kembalikeun deui tina sampah');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengajuan = Pengajuan::withTrashed()->findorfail($id);

        $data_pengajuan->forceDelete();
        return redirect()->back()->with('kuning', 'Data pengajuan parantos di hapus dina sampah');
    }

    // Pengajuan ==================================================================================================
    public function index_pemasukan()
    {
        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori', 'Kas')->get();

        return view('pengajuan.index', compact('data_pengajuan'));
    }
    // ------------------------------------------------------------------------------------------------------------
    // Pengluaran==================================================================================================
    public function index_tabungan()
    {
        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori', 'Tabungan')->get();

        return view('pengajuan.index', compact('data_pengajuan'));
    }
    // -----------------------------------------------------------------------------------------------------------
    // Pinjaman ==================================================================================================
    public function index_pinjam()
    {
        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori', 'Pinjaman')->get();

        return view('pengajuan.index', compact('data_pengajuan'));
    }
    // ------------------------------------------------------------------------------------------------------------
    // Bayar Pinjaman =============================================================================================
    public function index_bayar_pinjam()
    {
        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori', 'Bayar_Pinjaman')->get();

        return view('pengajuan.index', compact('data_pengajuan'));
    }
    // ------------------------------------------------------------------------------------------------------------

}
