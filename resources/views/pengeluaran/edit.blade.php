@extends('template.home')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-outline-tabs">
            <center>
                <h5 class="text-bold card-header bg-light p-0"> EDIT DATA {{$data_pengeluaran->anggaran->nama_anggaran}}</h5>
            </center>
            <div class="card-body">
                <form action="{{Route('pengeluaran.update',Crypt::encrypt($data_pengeluaran->id))}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    {{csrf_field()}}
                    <div class="card-body table-responsive">
                        <div class="row">
                            <input type="hidden">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anggaran_id">Anggaran</label>
                                    <select id="anggaran_id" name="anggaran_id" class="select2bs4 form-control @error('anggaran_id') is-invalid @enderror">
                                        @if (old('anggaran_id',$data_pengeluaran->anggaran_id) == true)
                                        <option value="{{old('anggaran_id',$data_pengeluaran->anggaran_id)}}">{{old('nama',$data_pengeluaran->anggaran->nama_anggaran)}}</option>
                                        @endif
                                        <option value="">-- Pilih Nama --</option>
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
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pengajuan (hidden) </label>
                                    <input type="datetime" id="" name="" value="{{$data_pengeluaran->tanggal}}" placeholder="Nama inisial" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Di Setujui (hidden)</label>
                                    <input type="datetime" id="" name="" value="{{$data_pengeluaran->created_at}}" placeholder="Nama inisial" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">jumlah</label>
                                    <input type="text" id="jumlah" name="jumlah" value="{{$data_pengeluaran->jumlah}}" placeholder="contoh@gmail.com" class="form-control @error('jumlah') is-invalid @enderror">
                                    @error('jumlah')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="textarea form-control bg-light @error('keterangan') is-invalid @enderror" id="summernote" rows="6" value="{{ old('keterangan') }}">{!!$data_pengeluaran->alasan!!}</textarea>
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Leres bade di simpen hasil editanna ? , Pengeditan kedah sepengetahuan nu sanes !')">Gentos</button>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div><!--/. container-fluid -->
</section>
@endsection
@section('script')
<script>
    $("#pinja").addClass("active");
</script>
@endsection