 @extends('template.home')
 @section('content')
 <section class="content">
     <div class="container-fluid">
         <!-- ./row -->
         <div class="row">
             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-outline card-outline-tabs">
                     <div class="card-body">
                         <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                             <ul class="products-list product-list-in-card pl-1 pr-1">
                                 <a href="" class="product-title">Jumlah Pemasukan Kas</a>
                                 <h5>{{ "Rp " . number_format($total_pemasukan,2,',','.') }}</h5>
                                 <p>Jumlah sadayana artos pemasukan uang kas nu terkumpul ti awal sareng dugi ayeuna</p>
                                 <hr>
                             </ul>

                             <ul class="products-list product-list-in-card pl-1 pr-1">
                                 <a href="" class="product-title">Jumlah Pengeluaran Kas</a>
                                 <h5>{{ "Rp " . number_format( $total_pengeluaran,2,',','.') }}</h5>
                                 <p> Jumlah sadayana pengluaran sesuai data anggaran, kecuali data pinjaman tidak termasuk pengluaran.</p>
                                 <hr>
                             </ul>

                         </div>
                     </div>
                     <!-- /.card -->
                 </div>
             </div>

             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-tabs">
                     <div class="card-body">
                         <table id="example1" class="table table-bordered table-striped table-responsive">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Bulan Pembayaran</th>
                                     <th>Nominal Kas</th>
                                     <th>Disetujui</th>
                                     <th>Tanggal Pengajuan</th>
                                     <th>Tanggal di Setujui</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 0; ?>
                                 @php
                                 $total = 0;
                                 @endphp
                                 @foreach($data_pemasukan as $data)
                                 <?php $no++; ?>
                                 <tr>
                                     <td>{{$no}}</td>
                                     <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                     <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                     <td>{{$data->pengurus->name}}</td>
                                     <td>{{$data->tanggal}}</td>
                                     <td>{{$data->created_at}}</td>

                                 </tr>
                                 @endforeach
                             </tbody>

                         </table>
                         <!-- /.table-body -->
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