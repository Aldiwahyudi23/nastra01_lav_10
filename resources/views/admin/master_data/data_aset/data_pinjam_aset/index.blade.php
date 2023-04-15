@extends('template.home')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-body">
                        <center>
                            <h5 class="text-bold card-header bg-light p-0"> PILIH DATA ASET DI TABEL</h5>
                        </center>
                        <hr>
                        <form action="{{Route('asetpinjam.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="nama_peminjam">Nama Peminjam</label>
                                <input type="text" id="nama_peminjam" name="nama_peminjam" value="{{ old('nama_peminjam') }}" placeholder="Nama aset" class="form-control col-12 @error('nama_peminjam') is-invalid @enderror" disabled>
                                @error('nama_peminjam')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi">Alasan Meminjam</label>
                                <textarea name="deskripsi" class="textarea form-control bg-light @error('deskripsi') is-invalid @enderror" id="summernote" rows="6" value="{{ old('deskripsi') }}" disabled></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="tanggal">Tanggal Pengembalian</label>
                                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" placeholder="Nama aset" class="form-control col-12 @error('tanggal') is-invalid @enderror" disabled>
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="qty">Jumlah Barang</label>
                                <input value="{{old('qty')}}" name="qty" type="number" class="form-control bg-light @error('qty') is-invalid @enderror" id="qty" disabled>
                                @error('qty')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="lokasi">Lokasi / Tempat di pakai</label>
                                <input value="{{old('lokasi')}}" name="lokasi" type="text" class="form-control bg-light @error('lokasi') is-invalid @enderror" id="lokasi" disabled>
                                @error('lokasi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <hr>
                            <p>PILIH HEULA BARANG ATANPI KODE DI table di handap</p>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA ASET</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-light">
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama aset</th>
                                    <th>persen</th>
                                    <th>Kondisi</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>lokasi terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($data_aset as $data)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{$no}}</td>

                                    <td>
                                        <a href="{{route('aset.pinjam.detail',Crypt::encrypt($data->id))}}" class="">
                                            {{$data->kode}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('aset.pinjam.detail',Crypt::encrypt($data->id))}}" class="">
                                            {{$data->nama_aset}}
                                        </a>
                                    </td>
                                    <td>{{$data->persen}}</td>
                                    <td>{{$data->kondisi}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->lokasi}}</td>
                                    <td>
                                        <form action="{{route('aset.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('aset.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                            <a href="{{route('aset.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                            @if (auth()->user()->role == 'Admin')
                                            <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina {{$data->nama}}  ?')"></i> </button>
                                            @endif
                                        </form>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-body -->

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
@endsection