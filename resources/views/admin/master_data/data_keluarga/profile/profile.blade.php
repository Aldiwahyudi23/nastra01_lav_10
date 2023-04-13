@extends('template.home')

@section('content')

<div class="col-12">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">

                <a href="{{ asset($user->foto) }}" data-toggle="lightbox" data-title="Foto Profile {{ $user->name }}" data-gallery="gallery" data-footer=''>


                    <img src="{{ asset( $user->foto) }}" width="130px" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                </a>

            </div>
            <h3 class="profile-username text-center">{{ $data_keluarga->nama }}</h3>
            <h5 class="profile-username text-center">( {{ $user->email}} )</h5>
            <p class="text-muted text-center">{{ $data_keluarga->role }}</p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>No Induk Anggota</b> <a class="float-right">{{ $data_keluarga->nik }}</a>
                </li>
                <a href="http://wa.me/62{{$data_keluarga->no_hp}}" class="text-center">
                    <strong><i class="fas fa-phone mr-1"></i>Whatshapp</strong>

                </a>
            </ul>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-12">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($foto as $data)
                <div class="product-img">
                    <a href="{{ asset( $data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $user->name }}" data-gallery="gallery">

                        <img src="{{ asset( $data->foto) }}" alt="Product Image" width="65px" height="65px" alt="Saya" class="brand-image img-circle elevation-3">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profil</h3>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Nama</th>
                    <td>{{ $data_keluarga->nama}}</td>
                </tr>
                <tr>
                    <th style="width:50%">NIK</th>
                    <td>{{ $data_keluarga->nik}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Jenis Kelamin</th>
                    <td>{{ $data_keluarga->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Tempat,Tanggal Lahir</th>
                    <td>{{ $data_keluarga->tempat_lahir}},{{ $data_keluarga->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Alamat</th>
                    <td>{{ $data_keluarga->alamat}}</td>
                </tr>
                <tr>
                    <th>No Handphone</th>
                    <td>{{ $data_keluarga->no_hp}}</td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td>{{$data_keluarga->pekerjaan}}</td>
                </tr>
                <tr>
                    <th>hubungan</th>
                    <td>{{$data_keluarga->hubungan}} dari {{$data_keluarga->keluarga->nama}} </td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td>{{$data_keluarga->anak_ke}}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection