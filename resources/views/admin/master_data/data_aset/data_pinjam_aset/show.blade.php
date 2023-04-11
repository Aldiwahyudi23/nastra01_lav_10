@extends('template.home')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DETAIL DATA PINJAMAN ASET</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td><b> Nama Peminjam</b></td>
                        <td>:</td>
                        <td><b> {{$data_pinjaman_aset->nama_peminjam}}</b></td>
                    </tr>
                    <tr>
                        <td>Alasan</td>
                        <td>:</td>
                        <td>{{$data_pinjaman_aset->alasan}}</td>
                    </tr>
                    <tr>
                        <td>Persen</td>
                        <td>:</td>
                        <td>{{$data_pinjaman_aset->persen}}</td>
                    </tr>
                    <tr>
                        <td>Limit Orang</td>
                        <td>:</td>
                        <td>{{$data_pinjaman_aset->kondisi}}</td>
                    </tr>
                    <tr>
                        <td>Limit Max Uang</td>
                        <td>:</td>
                        <td>{{$data_pinjaman_aset->kondisi}}</td>
                    </tr>

                </table>
                <table class="table table-hover table-head-fixed" id='tabelAgendaMasuk'>
                    <p> {!! $data_pinjaman_aset->alasan !!}</p>
                </table>

            </div>

        </div><!-- /.container-fluid -->
</section>

@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#Dataanggaran").addClass("active");
</script>
@endsection