@extends('template.home')

@section('content')

<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Data Program</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h6 class="card-header bg-light p-3"><i class="fas fa-credit-card"></i> TAMBAH DATA ROLE PROGRAM</h6>
                            <div class="card-body">
                                <table>
                                    @foreach ($data_program as $data)

                                    <tr>
                                        <td>{{$data->nama_program}}</td>
                                        <td>:</td>
                                        <td> <a href="{{Route('program.show',Crypt::encrypt($data->id))}}">PILIH</a> </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <table class="table" style="margin-top: -10px;">


                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{$data_role_program->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Ketua</td>
                                    <td>:</td>
                                    <td>{{$ketua->name}}</td>
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
                                        @if ($bulan > 5)
                                        {{ $tahun }}/{{ $tahun+1 }}
                                        @else
                                        {{ $tahun-1 }}/{{ $tahun }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Program</td>
                                    <td>:</td>
                                    <td>* {{$id->program1}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>* {{$id->program2}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>* {{$id->program3}}</td>
                                </tr>

                            </table>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
        </section>
    </div>
</section>

@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataProgram").addClass("active");
</script>
@endsection