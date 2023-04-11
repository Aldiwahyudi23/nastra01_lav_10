 @extends('template.home')
 @section('content')
 <div class="col-12">
     <!-- Profile Image -->
     <div class="card card-primary card-outline">
         <div class="card-body box-profile">
             <div class="text-center">
                 <img src="{{ asset( Auth::user()->foto) }}" width="130px" class="profile-user-img img-fluid img-circle" alt="User profile picture">
             </div>
             <h3 class="profile-username text-center">{{ $user->nama }}</h3>
             <h5 class="profile-username text-center">( {{ $user->name }} )</h5>
             <!-- <p class="text-muted text-center">{{ Auth::user()->role }}</p> -->
             <ul class="list-group list-group-unbordered mb-3">
                 <li class="list-group-item">
                     <b>Program </b> <a href="{{route('detail.anggota.kas',Crypt::encrypt($user->id))}}" class="float-right">{{ $user->program1 }}</a>
                 </li>
                 @if (Auth::user()->role == "Admin" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Sekertaris")
                 <li class="list-group-item">
                     <b></b> <a href="{{route('detail.anggota.tabungan',Crypt::encrypt($user->id))}}" class="float-right">{{ $user->program2 }}</a>
                 </li>
                 @endif
             </ul>
         </div>
         <!-- /.card-body -->
     </div>
     <!-- /.card -->
 </div>
 <div class="alert alert-info alert-dismissible fade show col-12" role="alert">
     <b><i class="fas fa-info"></i> INFORMASI !!!</b> <br>
     Data anu di handap nyaeta data pemasukan ti anggota anu atos bayar.
     <br>
     Kanggo ninggal antar anggota mangga ketik wae nama anggoata tina kolom <b>Search</b>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <section class="content">
     <div class="container-fluid">
         <div class="card">
             <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped table-responsive">
                     @include('pemasukan.table.kas_user')
                 </table>
             </div>
         </div>
     </div><!--/. container-fluid -->
 </section>
 @endsection