@extends('template.home')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-outline-tabs">
            <center>
                <h5 class="text-bold card-header bg-light p-0"> EDIT DATA {{$data_pemasukan->kategori}} {{$data_pemasukan->anggota->name}}</h5>
            </center>
            <div class="card-body">
                <form action="{{Route('pemasukan.update',Crypt::encrypt($data_pemasukan->id))}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    {{csrf_field()}}
                    <div class="card-body table-responsive">
                        <div class="row">
                            <input type="hidden">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control select2bs4 @error('kategori') is-invalid @enderror" required>
                                        @if ($data_pemasukan->kategori == $data_pemasukan->kategori)
                                        <option value="{{$data_pemasukan->kategori}}">{{$data_pemasukan->kategori}}</option>
                                        @endif
                                        <option value="">--Pilih Kategori--</option>
                                        <option value="Kas">Kas</option>
                                        <option value="Tabungan">Tabungan</option>
                                        <option value="Pinjaman">Pinjaman</option>
                                        <option value="Setor_Tunai">Setor Tunai</option>
                                        <option disabled value="Bayar_pinjam">Bayar Pinjaman</option>
                                    </select>
                                    @error('pembayaran')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pengajuan (hidden) </label>
                                    <input type="datetime" id="" name="" value="{{$data_pemasukan->tanggal}}" placeholder="Nama inisial" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Di Setujui (hidden)</label>
                                    <input type="datetime" id="" name="" value="{{$data_pemasukan->created_at}}" placeholder="Nama inisial" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">jumlah</label>
                                    <input type="text" id="jumlah" name="jumlah" value="{{$data_pemasukan->jumlah}}" placeholder="contoh@gmail.com" class="form-control @error('jumlah') is-invalid @enderror">
                                    @error('jumlah')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pembayaran">Metode Pembayaran</label>
                                    <select name="pembayaran" id="file" class="form-control select2bs4 @error('pembayaran') is-invalid @enderror" required>
                                        @if ($data_pemasukan->pembayaran == $data_pemasukan->pembayaran)
                                        <option value="{{$data_pemasukan->pembayaran}}">{{$data_pemasukan->pembayaran}}</option>
                                        @endif
                                        <option value="">--Pilih Pembayaran--</option>
                                        <option value="Cash">Uang Tunai</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                    @error('pembayaran')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group" id="noId"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="anggota_id">Anggota Keluarga</label>
                                    <select id="anggota_id" name="anggota_id" class="select2bs4 form-control @error('anggota_id') is-invalid @enderror">
                                        @if (old('anggota_id',$data_pemasukan->anggota_id) == true)
                                        <option value="{{old('anggota_id',$data_pemasukan->anggota_id)}}">{{old('nama',$data_pemasukan->anggota->name)}}</option>
                                        @endif
                                        <option value="">-- Pilih Nama --</option>
                                        @foreach ($data_anggota as $data)
                                        <option value="{{$data->id}}"> {{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('anggota_id')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="textarea form-control bg-light @error('keterangan') is-invalid @enderror" id="summernote" rows="6" value="{{ old('keterangan') }}">{!!$data_pemasukan->keterangan!!}</textarea>
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                @if($data_pemasukan->foto)
                                <hr>
                                <div class="product-img">
                                    <a href="{{asset($data_pemasukan->foto)}}" data-toggle="lightbox" data-title="Tanda Bukti" data-gallery="gallery">
                                        <img src="{{asset($data_pemasukan->foto)}}" alt="Product Image" width="50%" class=" brand-image elevation-3" style="display:block; margin:auto">
                                    </a>
                                </div>
                                @endif
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
<!-- Pemasukan edit -->
<script>
    $(document).ready(function() {
        $('#file').change(function() {
            var kel = $('#file option:selected').val();
            if (kel == "Transfer") {
                $("#noId").html('<div class="form-group"><label for="account-company">Bukti Transfer</label><input type="file" class="form-control" name="foto" id="foto" value="{{$data_pemasukan->foto}}" required /><span class="text-danger" style="font-size: 10px">Harap kirim tanda bukti transferan.</span>{{$data_pemasukan->foto}}</div>');
            } else {
                $("#noId").html('');
            }
        });
    });
</script>

<script>
    $("#bayar").addClass("active");
</script>
@endsection