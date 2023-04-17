 @extends('template.home')
 @section('content')
 <section class="content">
     <div class="container-fluid">
         <!-- ./row -->
         <div class="row">
             <div class="col-12 col-sm-12">
                 <div class="card card-primary card-tabs">
                     <div class="card-body">
                         <div class="alert alert-info alert-dismissible fade show" role="alert">
                             <b><i class="fas fa-info"></i> KETERANGAN</b> <br>
                             Data nu handap sesuai sareng data pengeluaran anu tos di<b>KONFIRMASI</b> ku pengurus ,Mangga cek deui datana bilih lepat atawa aya nu janggal. Kanggo sadayana anggota wajib ngecek setiap pengeluaran <br>
                             <hr>
                             <b> Catatan !!!</b> <br>
                             1. Data pengeluaran Pinjaman teu tiasa di tinggal detail (Privasi). <br>
                             2. Supados paham kana Anggaran Mangga baca deui deskripsi Anggaranna. soal na setiap pengeluaran sesuai sareng anu tos di sepakati. <br>
                             3. Setiap atau sadayana Pengeluaran pasti bakal aya pemberitahuan kana EMAIL, janten teu di share dina group Whatsapp.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="tab-content" id="custom-tabs-one-tabContent">
                             <table id="example1" class="table table-bordered table-striped table-responsive">
                                 <thead>
                                     <tr class="bg-light">
                                         <th>No.</th>
                                         <th>Anggaran</th>
                                         <th>Nominal Pengeluaran</th>
                                         <th>Alasan / Keterangan</th>
                                         <th>Tanggal Penginputan</th>
                                         <th>Nama Penginput</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        ?>
                                     @php
                                     $total = 0;
                                     @endphp
                                     @foreach($data_pengeluaran as $data)
                                     <?php $no++;
                                        ?>
                                     <tr>
                                         <td>{{$no}}</td>
                                         <td>{{$data->anggaran->nama_anggaran}}</td>
                                         <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                         <td>{!!$data->alasan!!}</td>
                                         <td>{{$data->tanggal}}</td>
                                         <td>{{$data->anggota->name}}</td>
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
     </div><!--/. container-fluid -->
 </section>
 @endsection
 @section('script')
 <script>
     $("#pinja").addClass("active");
 </script>
 @endsection