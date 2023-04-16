 @extends('template.home')
 @section('content')
 <div class="alert alert-info alert-dismissible fade show" role="alert">
     <b><i class="fas fa-info"></i> KETERANGAN</b> <br>
     Data nu handap sesuai sareng data peminjaman anu tos di<b>KONFIRMASI</b> ku pengurus ,Mangga cek deui datana bilih lepat atawa aya nu janggal. Kanggo sadayana anggota wajib ngecek setiap pengeluaran <br>
     <hr>
     <b> Catatan !!!</b> <br>
     1. Data pengeluaran Pinjaman teu tiasa di tinggal detail (Privasi). <br>
     2. Supados paham kana Anggaran Mangga baca deui deskripsi Anggaranna. soal na setiap pengeluaran sesuai sareng anu tos di sepakati. <br>
     3. Sadayana keputusan nyesuaikeun kondisi sareng situasi peminjaman anu atos di jelaskeun dina deskripsi Anggaran Pinjaman. <br>
     4. Kanggo anu teu acan tiasa hapunten, teu kenging berkecil hati ieu program jangka panjang. <br>
     5. Kanggo kalancaran sareng supados adil, nyuhunkeun <b>KERJASAMA</b> na sareng <b>TANGGUNG JAWAB</b> na. <br>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <section class="content">
     <div class="container-fluid">
         <!-- ./row -->
         <div class="row">
             <div class="col-12 col-sm-12">
                 <div class="card card-primary card-tabs">
                     <div class="card-body">

                         <div class="tab-content" id="custom-tabs-one-tabContent">
                             <table id="example1" class="table table-bordered table-striped table-responsive">
                                 <thead>
                                     <tr class="bg-light">
                                         <th>No.</th>
                                         <th>Status</th>
                                         <th>Nominal di Setujui</th>
                                         <th>Tanggal</th>
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
                                         <td>{{$data->status}}</td>
                                         <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                         <td>{{date('M-y',strtotime($data->tanggal)) }}</td>

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
     $("#pinjam").addClass("active");
 </script>
 @endsection