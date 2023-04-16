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
                                 <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Form Bayar KAS</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Deskripsi</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">S & K</a>
                             </li>
                         </ul>
                     </div>
                     <div class="card-body">
                         <div class="tab-content" id="custom-tabs-four-tabContent">
                             <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                 <!-- Form Admin -->
                                 @if(Auth::user()->role == "Admin" | Auth::user()->role == "Bendahara")
                                 @include('pemasukan.form_kas_admin')
                                 @else
                                 <!-- Form Anggota -->
                                 @if($cek_pengajuan >= 1)

                                 <body class="justify-content-center">
                                     <center>
                                         <h3><b> NUJU DI PROSES...</b></h3>
                                         <h3>Sampurasun dulur kabeh !</h3>
                                         <img src="https://c.tenor.com/Z8ezUHZzcLoAAAAC/love.gif" alt="" width="50%">
                                         <h3>Hore!!! Hatur nuhun atos bayar uang kas </h3>
                                         <h5>Harappp di antos nya sampe bendahara ngecek </h5>
                                     </center>
                                 </body>
                                 @else
                                 @include('pengajuan.form_kas')

                                 @endif
                                 <!-- ------------ -->
                                 @endif

                             </div>
                             <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                 {!!$program->deskripsi!!}
                             </div>
                             <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                 {!!$program->SnK!!}
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
                                 <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Kas</a>
                             </li>
                             @if(Auth::user()->program2 == "Tabungan")
                             <li class="nav-item">
                                 <a class="nav-link " id="custom-tabs-one-tabungan-tab" data-toggle="pill" href="#custom-tabs-one-tabungan" role="tab" aria-controls="custom-tabs-one-tabungan" aria-selected="false">Tabungan</a>
                             </li>
                             @endif
                             @if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Ketua" || Auth::user()->role == "Penasehat")
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Semua</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Anggota</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Setor Tunai</a>
                             </li>
                             @endif
                         </ul>
                     </div>
                     <div class="card-body">
                         <div class="tab-content" id="custom-tabs-one-tabContent">
                             <div class="tab-pane fade " id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                 <table id="example1" class="table table-bordered table-striped table-responsive">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Nama</th>
                                             <th>Nominal</th>
                                             <th>Bulan</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $no = 0; ?>
                                         @php
                                         $total = 0;
                                         @endphp
                                         @foreach($data_pemasukan_semua as $data)
                                         <?php $no++; ?>
                                         <tr>
                                             <td>{{$no}}</td>
                                             <td>{{$data->anggota->name}}</td>
                                             <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                             <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                             <td>
                                                 <form action="{{route('pemasukan.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                     @csrf
                                                     @method('delete')
                                                     <a href="{{route('pemasukan.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                     @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                     <a href="{{route('pemasukan.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                     @endif
                                                     @if (auth()->user()->role == 'Admin')
                                                     <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                     @endif
                                                 </form>
                                             </td>
                                         </tr>
                                         @endforeach
                                     </tbody>

                                 </table>
                                 <!-- /.table-body -->
                             </div>
                             <div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                 <table id="table1" class="table table-bordered table-striped table-responsive">

                                     @include('pemasukan.table.kas_user')
                                 </table>
                                 <!-- /.table-body -->
                             </div>
                             <div class="tab-pane fade show" id="custom-tabs-one-tabungan" role="tabpanel" aria-labelledby="custom-tabs-one-tabungan-tab">
                                 <table id="table3" class="table table-bordered table-striped table-responsive">
                                     @include('pemasukan.table.tabungan_user')
                                 </table>
                                 <!-- /.table-body -->
                             </div>
                             <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                 <table id="table4" class="table table-bordered table-striped table-responsive">
                                     @include('pemasukan.table.perAnggota')
                                 </table>
                                 <!-- /.table-body -->
                             </div>
                             <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                 <table id="table5" class="table table-bordered table-striped table-responsive">
                                     @include('pemasukan.table.setor_tunai')
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
     </div><!--/. container-fluid -->
 </section>
 @endsection
 @section('script')
 <script>
     $("#bayar").addClass("active");
 </script>
 @endsection