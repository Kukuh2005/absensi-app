<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon fas fa-tachometer-alt text-primary"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/kelas">
                <i class="icon-grid menu-icon fas fa-chalkboard-teacher text-primary"></i>
                <span class="menu-title">Kelas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/siswa">
                <i class="icon-grid menu-icon fas fa-user-graduate text-primary"></i>
                <span class="menu-title">Siswa</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->level == 'guru')
        <li class="nav-item">
            <a class="nav-link" href="/absensi">
                <i class="icon-grid menu-icon fas fa-clipboard-list text-primary"></i>
                <span class="menu-title">Absensi Siswa</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/rekap">
                <i class="icon-grid menu-icon fas fa-folder-open text-primary"></i>
                <span class="menu-title">Rekap Absensi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="icon-grid menu-icon fas fa-users text-primary"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
