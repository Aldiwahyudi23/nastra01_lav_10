@extends('template.home')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Trash Data Anggota Keluarga</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nomor Induk</th>
                        <th>Hubungan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_keluarga as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama_hubungan }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama }}" data-gallery="gallery" data-footer='<a href="" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                            </a>

                        </td>
                        <td>
                            <form action="{{ route('keluarga.kill',Crypt::encrypt($data->id)) }}" method="post">
                                @csrf
                                @method('post')
                                <a href="{{ route('keluarga.restore',Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                                <button class="btn btn-danger btn-sm mt-2" onclick="return confirm('Leres bade ngahapus data anu namina {{$data->nama}}  ?')"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(" #ViewTrash").addClass("active");
    $("#liViewTrash").addClass("menu-open");
    $("#TrashSiswa").addClass("active");
</script>
@endsection