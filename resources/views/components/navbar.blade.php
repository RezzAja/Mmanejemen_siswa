<nav class="navbar navbar-expand-lg  py-3" style="background-color: #d9d9d9;">
    <div class="container">
        <a href="{{route('dashboard')}}" class="navbar-brand fw-bold">Manajemen Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar nav gap-2 md-5">
                <li class="nav-item mt-1">
                    <a href="{{route('dashboard')}}" class=" nav-link btn {{ request()->is('/') ? 'active' : ''}}">
                        <i class='bx bxs-dashboard'></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a href="{{ route('siswa.index')}} {{ request()->is('siswa*') || request()->is('siswa*') ? 'active' : ''}}" class="nav-link btn">
                        <i class='bx bxs-user-badge'></i> Siswa
                    </a>
                </li>
                <li class="nav-item dropdown mt-1">
                    <a class=" nav-link btn dropdown-toggle {{ request()->is('jurusan*') || request()->is('kelas*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-building-house'></i> Kelas
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('kelas.index')}}">Kelas</a></li>
                      <li><a class="dropdown-item" href="{{ route('jurusan.index')}}">Jurusan</a></li>
                    </ul>
                  </li>
                <li class="nav-item mt-1">
                    <a href="{{route('guru.index')}}" class=" nav-link btn {{ request()->is('/guru*') ? 'active' : ''}}">
                        <i class='bx bx-user-pin'></i> Guru
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a href="{{route('mapel.index')}}" class=" nav-link btn ">
                        <i class='bx bx-notepad'></i> Mapel
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a href="{{route('spp.index')}}" class=" nav-link btn {{ request()->is('/spp*') ? 'active' : ''}}">
                        <i class='bx bx-user-pin'></i> Spp
                
                    
                
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class=" nav-link btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxl-mailchimp' style="font-size: 50px"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#">Log out</a></li>
                    </ul>
                  </li>
            </ul>
        </div>
    </div>
</nav>


