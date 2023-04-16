 @extends('template.home')
 @section('content')
 <section class="content">
     <div class="container-fluid">
         <!-- ./row -->
         <div class="row">
             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-outline card-outline-tabs">
                     <div class="card-header p-0 border-bottom-0">
                         <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                             <li class="nav-item">
                                 <a href="{{Route('pengeluaran.index')}}" class="nav-link " id="custom-tabs-four-home-tab">PINJAM</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Deskripsi</a>
                             </li>
                             @if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris")
                             <li class="nav-item">
                                 <a class="nav-link active" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">PENGELUARAN</a>
                             </li>
                             @endif
                         </ul>
                     </div>
                     <div class="card-body">
                         <div class="tab-content" id="custom-tabs-four-tabContent">
                             <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                 <!-- Form Anggota -->
                                 @include('pengeluaran.form_pengeluaran_admin')

                             </div>
                             <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                 {!!$program->deskripsi!!}
                             </div>
                         </div>
                     </div>
                     <!-- /.card -->
                 </div>
             </div>

             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-tabs">
                     <div class="card-header p-0 pt-1">
                         <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                             <li class="nav-item">
                                 <a class="nav-link active" id="custom-tabs-one-pinjaman-tab" data-toggle="pill" href="#custom-tabs-one-pinjaman" role="tab" aria-controls="custom-tabs-one-pinjaman" aria-selected="true">pinjaman"</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link " id="custom-tabs-one-pengajuan-tab" data-toggle="pill" href="#custom-tabs-one-pengajuan" role="tab" aria-controls="custom-tabs-one-pengajuan" aria-selected="false">pengajuan</a>
                             </li>

                         </ul>
                     </div>
                     <div class="card-body">
                         <div class="tab-content" id="custom-tabs-one-tabContent">

                             <div class="tab-pane fade show active" id="custom-tabs-one-pinjaman" role="tabpanel" aria-labelledby="custom-tabs-one-pinjaman-tab">
                                 <table id="example1" class="table table-bordered table-striped table-responsive">
                                     <thead>
                                         <tr class="bg-light">
                                             <th>No.</th>
                                             <th>Ket.</th>
                                             <th>Tanggal</th>
                                             <th>Jumlah</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php

                                            use Illuminate\Support\Facades\DB;

                                            $no = 0;
                                            ?>
                                         @php
                                         $total = 0;
                                         @endphp
                                         @foreach($data_pengeluaran_pinjaman as $data)
                                         <?php $no++;
                                            $status2 = DB::table('pengeluarans')->find($data->id);
                                            ?>
                                         <tr>
                                             <td>{{$no}}</td>
                                             <td>
                                                 <a href="{{Route('pengeluaran.index',Crypt::encrypt($data->id))}}" class="">
                                                     @if ( $status2->status == 'Lunas')
                                                     <i class="btn btn-success "> LUNAS </i>
                                                     @elseif ( $status2->status == 'Nunggak')
                                                     <i class=" btn btn-warning "> Bayar </i>
                                                     @endif
                                                     </i></a>
                                             </td>
                                             <td>{{$data->tanggal}}</td>
                                             <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>

                                         </tr>

                                         @php
                                         $total += $data->jumlah;
                                         @endphp
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <!-- /.table-body -->
                             </div>
                             <div class="tab-pane fade show" id="custom-tabs-one-pengajuan" role="tabpanel" aria-labelledby="custom-tabs-one-pengajuan-tab">
                                 <table id="example" class="table table-bordered table-striped table-responsive">
                                     <thead>
                                         <tr class="bg-light">
                                             <th>No.</th>
                                             <th>Nama</th>
                                             <th>Proses</th>
                                             <th>Tanggal</th>
                                             <th>Jumlah</th>
                                             <th>Hapus</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 0;
                                            ?>
                                         @php
                                         $total = 0;
                                         @endphp
                                         @foreach($cek_pengajuan_proses as $data)
                                         <?php $no++;
                                            $status2 = DB::table('pengeluarans')->find($data->id);
                                            ?>
                                         <tr>
                                             <td>{{$no}}</td>
                                             <td>{{$data->kategori}}</td>
                                             <td>
                                                 <a href="{{Route('pengajuan.show',Crypt::encrypt($data->id))}} " class="">
                                                     @if ( $data->status == 'Proses')
                                                     <i class="btn btn-success "> {{ $data->status}} </i>
                                                     @else
                                                     <i class=" btn btn-warning "> {{ $data->status}} Sementara </i>
                                                     @endif
                                                     </i></a>
                                             </td>
                                             <td>{{$data->tanggal}}</td>
                                             <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                             <td>
                                                 <form action="{{route('pengajuan.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                     @csrf
                                                     @method('delete')
                                                     <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                 </form>
                                             </td>
                                         </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 <!-- /.table-body -->
                             </div>

                         </div>
                     </div>
                     <!-- /.card -->
                 </div>
             </div>
         </div>
         <!-- /.row -->
         <div class="card">
             <div class="card card-primary card-tabs">
                 <div class="card-header p-0 pt-1">
                     <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                         <li class="nav-item">
                             <a class="nav-link active" id="custom-tabs-one-lain-tab" data-toggle="pill" href="#custom-tabs-one-lain" role="tab" aria-controls="custom-tabs-one-lain" aria-selected="true">Lain"</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " id="custom-tabs-one-darurat-tab" data-toggle="pill" href="#custom-tabs-one-darurat" role="tab" aria-controls="custom-tabs-one-darurat" aria-selected="false">Darurat</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " id="custom-tabs-one-usaha-tab" data-toggle="pill" href="#custom-tabs-one-usaha" role="tab" aria-controls="custom-tabs-one-usaha" aria-selected="false">Usaha</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " id="custom-tabs-one-amal-tab" data-toggle="pill" href="#custom-tabs-one-amal" role="tab" aria-controls="custom-tabs-one-amal" aria-selected="false">Amal</a>
                         </li>
                         @if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Ketua" || Auth::user()->role == "Ketua")
                         <li class="nav-item">
                             <a class="nav-link" id="custom-tabs-one-pinjam-tab" data-toggle="pill" href="#custom-tabs-one-pinjam" role="tab" aria-controls="custom-tabs-one-pinjam" aria-selected="false">Pinjam</a>
                         </li>

                         @endif
                     </ul>
                 </div>
                 <div class="card-body">
                     <div class="tab-content" id="custom-tabs-one-tabContent">

                         <div class="tab-pane fade show active" id="custom-tabs-one-lain" role="tabpanel" aria-labelledby="custom-tabs-one-lain-tab">
                             <table id="table1" class="table table-bordered table-striped table-responsive">
                                 @include('pengeluaran.table.dana_lain')
                             </table>
                             <!-- /.table-body -->
                         </div>
                         <div class="tab-pane fade show" id="custom-tabs-one-darurat" role="tabpanel" aria-labelledby="custom-tabs-one-darurat-tab">
                             <table id="table2" class="table table-bordered table-striped table-responsive">
                                 @include('pengeluaran.table.dana_darurat')
                             </table>
                             <!-- /.table-body -->
                         </div>
                         <div class="tab-pane fade show" id="custom-tabs-one-usaha" role="tabpanel" aria-labelledby="custom-tabs-one-usaha-tab">
                             <table id="table3" class="table table-bordered table-striped table-responsive">
                                 @include('pengeluaran.table.dana_usaha')
                             </table>
                             <!-- /.table-body -->
                         </div>
                         <div class="tab-pane fade show" id="custom-tabs-one-amal" role="tabpanel" aria-labelledby="custom-tabs-one-amal-tab">
                             <table id="table4" class="table table-bordered table-striped table-responsive">
                                 @include('pengeluaran.table.dana_amal')
                             </table>
                             <!-- /.table-body -->
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-one-pinjam" role="tabpanel" aria-labelledby="custom-tabs-one-pinjam-tab">
                             <table id="table5" class="table table-bordered table-striped table-responsive">
                                 @include('pengeluaran.table.dana_pinjam')
                             </table>
                             <!-- /.table-body -->
                         </div>
                     </div>
                 </div>
                 <!-- /.card -->
             </div>
         </div>
     </div><!--/. container-fluid -->
 </section>
 @endsection
 @section('script')
 <script>
     $("#pinjam").addClass("active");
 </script>
 @endsection