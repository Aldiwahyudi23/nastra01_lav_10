  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Pengajuan
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{Route('table-pengajuan-kas')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>KAS</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('table-pengajuan-tabungan')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Tabungan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('table-pengajuan-pinjaman')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pinjaman</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('table-pengajuan-bayar_pinjaman')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bayar Pinjaman</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Mater Data
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{Route('program.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Program</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('anggaran.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Anggaran</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('aset.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Aset</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('role.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Role /Akses</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('role.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>User</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item has-treeview" id="liViewTrash">
                      <a href="#" class="nav-link" id="ViewTrash">
                          <i class="nav-icon fas fa-recycle"></i>
                          <p>
                              View Trash

                          </p>
                      </a>
                      <ul class="nav nav-treeview ml-4">
                          <li class="nav-item">
                              <a href="{{Route('role.trash')}}" class="nav-link" id="TrashJadwal">
                                  <i class="fas fa-calendar-alt nav-icon"></i>
                                  <p>Trash Role</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{Route('program.trash')}}" class="nav-link" id="TrashProgram">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Program</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('anggaran.trash')}}" class="nav-link" id="TrashAnggaran">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Anggaran</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('pemasukan.trash')}}" class="nav-link" id="TrashAnggaran">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Pemasukan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('pengajuan.trash')}}" class="nav-link" id="TrashAnggaran">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Pengajuan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('pengeluaran.trash')}}" class="nav-link" id="TrashAnggaran">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Pengeluaran</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{Route('aset.trash')}}" class="nav-link" id="TrashAnggaran">
                                  <i class="fas fa-home nav-icon"></i>
                                  <p>Trash Aset</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-header">EXAMPLES</li>
                  <li class="nav-item">
                      <a href="pages/calendar.html" class="nav-link">
                          <i class="nav-icon fas fa-calendar-alt"></i>
                          <p>
                              Calendar
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/gallery.html" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Gallery
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{Route('asetpinjam.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                              Pinjaman ASET
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon far fa-envelope"></i>
                          <p>
                              Mailbox
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/mailbox/mailbox.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Inbox</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/mailbox/compose.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Compose</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/mailbox/read-mail.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Read</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/examples/invoice.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Invoice</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/profile.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Profile</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/e-commerce.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>E-commerce</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/projects.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Projects</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-add.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-edit.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Edit</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/project-detail.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Project Detail</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/contacts.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contacts</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/faq.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>FAQ</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/contact-us.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact us</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon far fa-plus-square"></i>
                          <p>
                              Extras
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Login & Register v1
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="pages/examples/login.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Login v1</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/register.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Register v1</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/forgot-password.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Forgot Password v1</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/recover-password.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Recover Password v1</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Login & Register v2
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="pages/examples/login-v2.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Login v2</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/register-v2.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Register v2</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Forgot Password v2</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Recover Password v2</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/lockscreen.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lockscreen</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Legacy User Menu</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/language-menu.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Language Menu</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/404.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Error 404</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/500.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Error 500</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/pace.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pace</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/examples/blank.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Blank Page</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="starter.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Starter Page</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-search"></i>
                          <p>
                              Search
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/search/simple.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Simple Search</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/search/enhanced.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Enhanced</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Kaluar</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>

                  </li>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>