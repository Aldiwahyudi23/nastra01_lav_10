<?php

namespace App\Http\Controllers;

use App\Models\AsetPinjam;
use App\Http\Controllers\Controller;
use App\Models\Aset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AsetPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_aset_pinjam = AsetPinjam::all();
        $data_aset = Aset::all();
        return view('admin.master_data.data_aset.data_pinjam_aset.index', compact('data_aset_pinjam', 'data_aset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $id = Crypt::decrypt($id);

        $data_aset = Aset::find($id);
        $data_aset_all = Aset::all();
        return view('admin.master_data.data_aset.data_pinjam_aset.detail', compact('data_aset', 'data_aset_all'));
    }
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



            'nama_peminjam' => 'required',
            'deskripsi' => 'required',
            'tanggal_kembali' => 'required',
            'qty' => 'required',
            'lokasi' => 'required',
        ], [

            'kondisi.required' => 'kondisi keudah di isi',
            'persen.required' => 'kondisi berdasarkan persen keudah di isi',

            'nama_peminjam.required' => ' Nama keudah di isi',
            'deskripsi.required' => 'Des keudah di isi',
            'tanggal_kembali.required' => 'Tanggal keudah di isi',
            'qty.required' => 'Jumlah keudah di isi',
            'lokasi.required' => 'lokasi keudah di isi',
        ]);
        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'Aset-pinjam-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/aset/pinjaman/'), $nama);
        }
        $data_aset = new AsetPinjam();
        $data_aset->anggota_id = Auth::user()->id;
        $data_aset->aset_id = $request->aset_id;
        $data_aset->kode = $request->kode;
        $data_aset->persen = $request->persen;
        $data_aset->kondisi = $request->kondisi;
        $data_aset->nama_peminjam = $request->nama_peminjam;
        $data_aset->alasan = $request->deskripsi;
        $data_aset->tanggal_pinjam = Carbon::now();
        $data_aset->tanggal_kembali = $request->tanggal_kembali;
        $data_aset->qty = $request->qty;
        $data_aset->lokasi = $request->lokasi;
        $data_aset->status = $request->status;

        if ($request->foto) {
            $data_aset->foto          = "/img/aset/pinjaman/$nama";
        }

        $data_aset->save();


        return redirect()->back()->with('sukses', 'Wihhhhhh gaduh aset deui...allhamdulilahhh mudah mudahan lancarrr');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_pinjaman_aset = AsetPinjam::find($id);

        return view('admin.master_data.data_aset.data_pinjam_aset.show', compact('data_pinjaman_aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsetPinjam $asetPinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsetPinjam $asetPinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsetPinjam $asetPinjam)
    {
        //
    }
}
