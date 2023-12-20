<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- clear --}}
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-speedometer2 menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- clear --}}
        <li class="nav-item">
            <a class="nav-link" href="/buku">
                <i class="bi bi-book menu-icon"></i>
                <span class="menu-title">Buku</span>
            </a>
        </li>
        {{-- clear --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="bi bi-list menu-icon"></i>
                <span class="menu-title">Detail</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/pengarang">Pengarang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/penerbit">Penerbit</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kategori">Kategori</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/status">
                <i class="bi bi-exclamation-lg menu-icon"></i>
                <span class="menu-title">Status peminjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kelola">
                <i class="bi bi-person menu-icon"></i>
                <span class="menu-title">Kelola Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="bi bi-box-arrow-left menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
