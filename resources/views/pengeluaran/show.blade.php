@extends('template.home')

@section('content')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <b><i class="fas fa-info"></i> INFO !!!</b> <br>
    Data nu handap sesuai sareng data pengeluaran anu tos di<b>KONFIRMASI</b> ku pengurus ,Mangga cek deui datana bilih lepat
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td width="150px">Anggaran</td>
                                    <td width="10px">:</td>
                                    <td>{{ $data_pengeluaran->anggaran->nama_anggaran }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pengurus</td>
                                    <td>:</td>
                                    <td>{{ $data_pengeluaran->anggota->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td>:</td>
                                    <td>{{ "Rp " . number_format($data_pengeluaran->jumlah,2,',','.') }}</td>
                                </tr>
                                <tr>
                                    <td>Tangaal Pengajuan</td>
                                    <td>:</td>
                                    <td>{{$data_pengeluaran->tanggal }}</td>
                                </tr>
                                <tr>
                                    <td>Tangaal diKonfirmasi</td>
                                    <td>:</td>
                                    <td>{{$data_pengeluaran->created_at }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="">
                            <h5 class=" text-center">Keterangan</h5>
                            {!!$data_pengeluaran->alasan!!}

                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $("#pinja").addClass("active");
</script>
@endsection