<?php

use App\Models\Keluarga;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$id = User::find(Auth::user()->id); // data user di table user
$data_keluarga = Keluarga::find($id->keluarga_id); //data user di data keluarga

?>
<footer id"headera" class=" navbar-dark navbar-expand d-md-none d-lg-none d-xl-none" style="background-color: #f70404;" id="headera">
    <ul class="navbar-nav nav-justified nav nav-treeview nav-pills" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" role="button">
            <a href="/" class="nav-link text-center " id="imah"><i class=" fas fa-home lg-6" width="1.5em" height="1.5em"></i><span class="small d-block">Home</span></a>
        </li>
        @if(Auth::user()->program1 == "Kas")
        <li class="nav-item">
            <a href="{{Route('pemasukan.index')}}" id="bayar" class="nav-link text-center"><i class="nav-icon fas fa-credit-card nav-icon"></i> <span class="small d-block">Bayar</span></a>
        </li>
        @else
        @if ($data_keluarga->hubungan == "Suami" || $data_keluarga->hubungan == "Istri" )
        <li class="nav-item">
            <a href="{{Route('pemasukan.index')}}" id="bayar" class="nav-link text-center"><i class="nav-icon fas fa-credit-card nav-icon"></i> <span class="small d-block">stori</span></a>
        </li>
        @endif
        @endif
        <li class="nav-item" id="profile">
            <a href="{{Route('profile')}}" id="profile"><img src="{{ asset( Auth::user()->foto) }}" width="45px" height="45px" alt="Saya" class="brand-image img-circle elevation-3">
            </a>
        </li>
        @if(Auth::user()->program1 == "Kas")
        <li class="nav-item">
            <a href="{{Route('pengeluaran.index')}}" id="pinja" class="nav-link text-center"><i class="nav-icon fas fa-handshake "></i><span class="small d-block">Pinjam</span></a>
        </li>
        @else
        @if ($data_keluarga->hubungan == "Suami" || $data_keluarga->hubungan == "Istri" )
        <li class="nav-item">
            <a href="{{Route('pengeluaran.index')}}" id="pinja" class="nav-link text-center"><i class="nav-icon fas fa-handshake "></i><span class="small d-block">Pinjam</span></a>
        </li>
        @endif
        @endif
        <li class="nav-item">
            <a href="/peraturan" id="Pengaturan" class="nav-link text-center"><i class="nav-icon fas fa-cogs"></i> <span class="small d-block">Sett</span></a>
        </li>

    </ul>

    <marquee>
        <strong>TUNAS NUSANTARA 01</strong>
    </marquee>

</footer>