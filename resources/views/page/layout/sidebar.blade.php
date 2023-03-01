<div class="nk-sidebar">
  <div class="nk-nav-scroll ">
    <ul class="metismenu" id="menu">
      @if(Auth::user()->level=="Admin")
      <!--<li class="nav-label">Dashboard Admin</li>-->
      <li>
        <a href="{{route('dashboard_admin')}}" aria-expanded="false">
          <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
        </a>
      </li>

      <!--<li class="nav-label">Postingan yang di Laporkan | User Report</li>-->
      <li>
        <a href="#" aria-expanded="false">
          <i class="fa fa-superpowers"></i><span class="nav-text">Laporan Postingan</span>
        </a>
      </li>

      <!-- <li class="nav-label">Semua Postingan</li> -->
      <li>
        <a href="#" aria-expanded="false">
          <i class="fa fa-file-o"></i><span class="nav-text">Semua Postingan</span>
        </a>
      </li>

      <!--<li class="nav-label">Data Master</li>-->
      <li class="mega-menu mega-menu-sm">
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
          <i class="icon-layers menu-icon"></i><span class="nav-text">Data Master</span>
        </a>
        <ul aria-expanded="false">
          <li>
            <a href="#">
              Data User
            </a>
          </li>
          <li>
            <a href="#">
              Data Kategori
            </a>
          </li>
        </ul>
      </li>
      @else

      <!--<li class="nav-label">Postingan Saya | Unggah Berita</li>-->
      <li>
        <a href="#" aria-expanded="false">
          <i class="icon-note menu-icon"></i><span class="nav-text">Postingan Saya</span>
        </a>
      </li>

      <li>
        <a href="#" aria-expanded="false">
          <i class="fa fa-file-o"></i><span class="nav-text">Semua Postingan</span>
        </a>
      </li>

      <!--<li class="nav-label">Pengajuan Klaim Saya | Informasi & Klaim</li>-->
      <li>
        <a href="#" aria-expanded="false">
          <i class="icon-grid menu-icon"></i><span class="nav-text">Klaim Saya</span>
        </a>
      </li>

      <!--<li class="nav-label">Postingan Saya | Postingan yang di Klaim</li>-->
      <li>
        <a href="#" aria-expanded="false">
          <i class="fa fa-info"></i><span class="nav-text">Postingan di Klaim</span>
        </a>
      </li>

      @endif

    </ul>
  </div>
</div>