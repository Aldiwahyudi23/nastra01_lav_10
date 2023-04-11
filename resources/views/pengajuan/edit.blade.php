 @extends('template.home')
 @section('content')
 <section class="content">
     <div class="container-fluid">
         <!-- ./row -->
         <div class="row">
             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-outline card-outline-tabs">
                     <center>
                         <h5 class="text-bold card-header bg-light p-0"> EDIT DATA {{$data_pengajuan->kategori}} {{$data_pengajuan->anggota->name}}</h5>
                     </center>
                     <div class="card-body">
                         <form action="{{Route('pengajuan.update',Crypt::encrypt($data_pengajuan->id))}}" method="POST" enctype="multipart/form-data" novalidate>
                             @method('PATCH')
                             {{csrf_field()}}
                             @if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris")
                             <div class="form-group">
                                 <label for="anggota_id">Anggota Keluarga</label>
                                 <select id="anggota_id" name="anggota_id" class="select2bs4 form-control @error('anggota_id') is-invalid @enderror">
                                     @if (old('anggota_id',$data_pengajuan->anggota_id) == true)
                                     <option value="{{old('anggota_id',$data_pengajuan->anggota_id)}}">{{old('nama',$data_pengajuan->anggota->name)}}</option>
                                     @endif
                                     <option value="">-- Pilih Nama --</option>
                                     @foreach ($data_anggota as $data)
                                     <option value="{{$data->id}}"> {{$data->name}}</option>
                                     @endforeach
                                 </select>
                                 @error('anggota_id')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label for="kategori">Kategori</label>
                                 <select name="kategori" id="kategori" class="form-control select2bs4 @error('kategori') is-invalid @enderror" required>
                                     @if ($data_pengajuan->kategori == $data_pengajuan->kategori)
                                     <option value="{{$data_pengajuan->kategori}}">{{$data_pengajuan->kategori}}</option>
                                     @endif
                                     <option value="">--Pilih Kategori--</option>
                                     <option value="Kas">Kas</option>
                                     <option value="Tabungan">Tabungan</option>
                                     <option value="Pinjaman">Pinjaman</option>
                                 </select>
                                 @error('pembayaran')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             @else
                             <input type="hidden" id="kategori" name="kategori" value="{{$data_pengajuan->kategori}}">
                             <input type="hidden" id="anggota_id" name="anggota_id" value="{{$data_pengajuan->anggota_id}}">
                             @endif
                             <div class="form-group">
                                 <label for="tanggal">Tanggal Pengajuan (disable) </label>
                                 <input type="datetime" id="" name="" value="{{$data_pengajuan->tanggal}}" placeholder="Nama inisial" class="form-control" disabled>
                             </div>
                             <div class="form-group">
                                 <label for="tanggal">Tanggal Di Setujui (disable)</label>
                                 <input type="datetime" id="" name="" value="{{$data_pengajuan->status}}" placeholder="Nama inisial" class="form-control" disabled>
                             </div>
                             <div class="form-group">
                                 <label for="jumlah">jumlah</label>
                                 <input type="text" id="jumlah" name="jumlah" value="{{$data_pengajuan->jumlah}}" placeholder="contoh@gmail.com" class="form-control @error('jumlah') is-invalid @enderror">
                                 @error('jumlah')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label for="pembayaran">Metode Pembayaran</label>
                                 <select name="pembayaran" id="file" class="form-control select2bs4 @error('pembayaran') is-invalid @enderror" required>
                                     @if ($data_pengajuan->pembayaran == $data_pengajuan->pembayaran)
                                     <option value="{{$data_pengajuan->pembayaran}}">{{$data_pengajuan->pembayaran}}</option>
                                     @endif
                                     <option value="">--Pilih Pembayaran--</option>
                                     <option value="Cash">Uang Tunai</option>
                                     <option value="Transfer">Transfer</option>
                                 </select>
                                 @error('pembayaran')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             <div class="form-group" id="noId"></div>

                             <div class="form-group">
                                 <label for="keterangan">Keterangan</label>
                                 <textarea name="keterangan" class="textarea form-control bg-light @error('keterangan') is-invalid @enderror" id="summernote" rows="6" value="{{ old('keterangan') }}">{!!$data_pengajuan->keterangan!!}}</textarea>
                                 @error('keterangan')
                                 <div class="invalid-feedback">
                                     <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             <div class="product-img">
                                 <a href="{{asset($data_pengajuan->foto)}}" data-toggle="lightbox" data-title="Tanda Bukti" data-gallery="gallery">
                                     <img src="{{asset($data_pengajuan->foto)}}" alt="Product Image" width="50%" class=" brand-image elevation-3" style="display:block; margin:auto">
                                 </a>
                             </div>
                             <hr>
                             <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Leres bade di simpen hasil editanna ? , Pengeditan kedah sepengetahuan nu sanes !')">Gentos</button>
                         </form>
                     </div>
                     <!-- /.card -->
                 </div>
             </div>

             <div class="col-12 col-sm-6">
                 <div class="card card-primary card-tabs">
                     <div class="card-header p-0 pt-1">
                         <h3>Data Pengajuan</h3>
                     </div>
                     <div class="card-body">
                         <!-- Data bisa di lihat oleh admin dan sekertaris -->
                         @if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris")
                         <table id="example1" class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th>Kategori</th>
                                     <th>Nama</th>
                                     <th>Nominal</th>
                                     <th>Bulan</th>
                                     <th>Ket</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 0; ?>
                                 @php
                                 $total = 0;
                                 @endphp
                                 @foreach($data_pengajuan_semua as $data)
                                 <?php $no++; ?>
                                 <tr>
                                     <td>{{$data->kategori}}</td>
                                     <td>{{$data->anggota->name}}</td>
                                     <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                     <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                     <td> {!!$data->keterangan!!}</td>
                                     <td>
                                         <form action="{{route('pengajuan.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                             @csrf
                                             @method('delete')
                                             <a href="{{route('pengajuan.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                             @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                             <a href="{{route('pengajuan.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
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
                         @else
                         <p>Data pengajuan masih tiasa di edit, tapi kedah leres data na.</p>
                         <p>Pami Status masih <b>Proses</b> eta nuju di cek heula ku nu bersangkutan, kin otomatis bakal masuk nyalira pami atos di setujui</p>
                         @endif
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
 <!-- Pemasukan edit -->
 <script>
     $(document).ready(function() {
         $('#file').change(function() {
             var kel = $('#file option:selected').val();
             if (kel == "Transfer") {
                 $("#noId").html('<div class="form-group"><label for="account-company">Bukti Transfer</label><input type="file" class="form-control" name="foto" id="foto" value="{{$data_pengajuan->foto}}" required /><span class="text-danger" style="font-size: 10px">Harap kirim tanda bukti transferan.</span>{{$data_pengajuan->foto}}</div>');
             } else {
                 $("#noId").html('');
             }
         });
     });
 </script>
 <!-- scrip Untuk elemen Button -->
 <!-- <script>
     function tombol() {
         document.getElementById("anggota_id").Disabled = false
     }
 </script> -->
 @endsection