@extends('template.home')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DETAIL DATA PROGRAM</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>program</td>
                        <td>:</td>
                        <td>{{$data_program->nama_program}}</td>
                    </tr>

                    @php
                    $bulan = date('m');
                    $tahun = date('Y');
                    @endphp
                    <tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                            {{ $tahun }}/{{ $tahun+1 }}
                            @else
                            {{ $tahun-1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>

                </table>
                <table class="table table-hover table-head-fixed" id='tabelAgendaMasuk'>
                    <p> {!! $data_program->deskripsi !!}</p>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection