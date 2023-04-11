<?php

use Carbon\Carbon;

$tanggal = Carbon::now();
?>
<center>
    <img src="https://media.tenor.com/LAkobF0eiDwAAAAC/assalamu-alaikum-salam.gif" alt="" width="50%">
    <h5 class="text-bold card-header bg-light p-0"> PENGELUARAN</h5>
</center>
<div class="">
    <form action="{{Route('pengeluaran.store')}}" method="POST" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        <div class="form-group row">
            <label for="anggaran_id">anggaran Keluarga</label>
            <select id="anggaran_id" name="anggaran_id" class="select2 form-control @error('anggaran_id') is-invalid @enderror">
                @if (old('anggaran_id') == true)
                <option value="{{old('anggaran_id')}}">{{old('nama')}}</option>
                @endif
                <option value="">-- Pilih Anggaran --</option>
                @foreach ($data_anggaran as $data)
                <option value="{{$data->id}}"> {{$data->nama_anggaran}}</option>
                @endforeach
            </select>
            @error('anggaran_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group row">
            <label for="jumlah">Nominal</label>
            <input type="text" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" placeholder="Cont : 50000    jangan pake titik ataupun koma" class="form-control col-12 @error('jumlah') is-invalid @enderror">
            @error('jumlah')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="textarea form-control bg-light @error('keterangan') is-invalid @enderror" id="summernote" rows="6" value="{{ old('keterangan') }}"></textarea>
            @error('keterangan')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <hr>
        <button onclick="tombol()" id="myBtn" type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPEN</button>
        <div id="tombol_proses"></div>
    </form>
</div>