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
                            <h5 class="text-bold card-header bg-light p-0"> TAMBAH DATA PINJAMAN ASET</h5>
                        </center>
                        <hr>
                        <form action="{{Route('asetpinjam.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if ($data_aset->qty == 0)

                            <body class="justify-content-center">
                                <center>
                                    <h3><b> DUHHH HAPUNTEN BARANG NA TEU AYA NUJU DI TAMBUT</b></h3>
                                    <h3>Sampurasun dulur kabeh !</h3>
                                    <img src="https://c.tenor.com/Z8ezUHZzcLoAAAAC/love.gif" alt="" width="50%">
                                    <h3>Puntennya barang na nuju di tambut keneh teu acan di uwihkeun deui </h3>
                                    <h5>Harappp di cek deui kanggo anu ka titipanna </h5>
                                </center>
                            </body>
                            @else
                            <table class="table" style="margin-top: -10px;">
                                <tr>
                                    <td><b> KOde</b></td>
                                    <td>:</td>
                                    <td> {{$data_aset->kode}}</td>
                                </tr>
                                <tr>
                                    <td>Aset</td>
                                    <td>:</td>
                                    <td>{{$data_aset->nama_aset}}</td>

                                </tr>
                                <tr>
                                    <td>Persen</td>
                                    <td>:</td>
                                    <td>{{$data_aset->persen}}</td>
                                </tr>
                                <tr>
                                    <td>Kondisi</td>
                                    <td>:</td>
                                    <td>{{$data_aset->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td>{{$data_aset->qty}}</td>
                                </tr>

                            </table>

                            <input type="hidden" name="aset_id" id="aset_id" value="{{$data_aset->id}}">
                            <input type="hidden" name="kode" id="kode" value="{{$data_aset->kode}}">
                            <input type="hidden" name="nama_aset" id="nama_aset" value="{{$data_aset->nama_aset}}">
                            <input type="hidden" name="persen" id="persen" value="{{$data_aset->persen}}">
                            <input type="hidden" name="kondisi" id="kondisi" value="{{$data_aset->kondisi}}">
                            <input type="hidden" name="status" id="status" value="Pinjam">
                            <div class="form-group row">
                                <label for="nama_peminjam">Nama Peminjam</label>
                                <input type="text" id="nama_peminjam" name="nama_peminjam" value="{{ old('nama_peminjam') }}" placeholder="Nama aset" class="form-control col-12 @error('nama_peminjam') is-invalid @enderror">
                                @error('nama_peminjam')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi">Alasan Meminjam</label>
                                <textarea name="deskripsi" class="textarea form-control bg-light @error('deskripsi') is-invalid @enderror" id="summernote" rows="6" value="{{ old('deskripsi') }}">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_kembali">tanggal_kembali Pengembalian</label>
                                <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" placeholder="Nama aset" class="form-control col-12 @error('tanggal_kembali') is-invalid @enderror">
                                @error('tanggal_kembali')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="qty">Jumlah Barang</label>
                                <input value="{{old('qty')}}" name="qty" type="number" class="form-control bg-light @error('qty') is-invalid @enderror" id="qty">
                                @error('qty')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="lokasi">Lokasi / Tempat di pakai</label>
                                <input value="{{old('lokasi')}}" name="lokasi" type="text" class="form-control bg-light @error('lokasi') is-invalid @enderror" id="lokasi">
                                @error('lokasi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <hr>
                            <button onclick="tombol()" id="myBtn" type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPEN</button>
                            <div id="tombol_proses"></div>

                            @endif
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
                                @foreach($data_aset_all as $data)
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
                                            <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina {{$data->nama}}  ?')"></i> </button>
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