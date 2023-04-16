<footer id"headera" class=" navbar-light bg-white navbar-expand d-md-none d-lg-none d-xl-none" id="headera">
    <ul class="navbar-nav nav-justified nav nav-treeview nav-pills" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" role="button">
            <a href="/" class="nav-link text-center " id="imah"><i class=" fas fa-home lg-6" width="1.5em" height="1.5em"></i><span class="small d-block">Home</span></a>
        </li>
        @if (Auth::user()->program1 == "Kas")

        <li class="nav-item">
            <a href="{{Route('pemasukan.index')}}" id="bayar" class="nav-link text-center"><i class="nav-icon fas fa-credit-card nav-icon"></i> <span class="small d-block">Bayar</span></a>
        </li>
        @endif
        <li class="nav-item" id="profile">
            <a href="{{Route('profile')}}" id="profile"><img src="{{ asset( Auth::user()->foto) }}" width="45px" height="45px" alt="Saya" class="brand-image img-circle elevation-3">
            </a>
        </li>
        @if(Auth::user()->program1 == "Kas")
        <li class="nav-item">
            <a href="{{Route('pengeluaran.index')}}" id="pinjam" class="nav-link text-center"><i class="nav-icon fas fa-handshake "></i><span class="small d-block">Pinjam</span></a>
        </li>
        @endif
        <li class="nav-item">
            <a href="/peraturan" id="Pengaturan" class="nav-link text-center"><i class="nav-icon fas fa-cogs"></i> <span class="small d-block">Sett</span></a>
        </li>

    </ul>

    <marquee>
        <strong>KELUARGA BESAR Alm. MA HAYA. Mengucapkan selamat menunaikan Ibadah PUASA </strong>
    </marquee>

</footer>