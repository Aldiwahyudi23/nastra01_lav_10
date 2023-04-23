@extends('template.home')

@section('content')

<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-users my-1 btn-sm-1"></i> Data Anggota Keluarga</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach($data_keluarga as $data)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" id="myMenu">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{$data->hubungan}} ke {{$data->anak_ke}} dari {{$data->keluarga->nama}}
                            </div>
                            <div class="card-body pt-0" id="card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead" id="nama"><b>{{$data->nama}}</b></h2>
                                        <p class="text-muted text-sm"><b>Status: </b> {{$data->pekerjaan}} </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: {{$data->alamat}}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$data->no_hp}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{ asset($data->foto) }}" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="http://wa.me/62{{$data->no_hp}}" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="{{route('keluarga.show',Crypt::encrypt($data->id))}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Lihat Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- /.container-fluid -->
        </section>
    </div>
</section>


@endsection