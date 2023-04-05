
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh;">
        <a href="/" class="d-flex align-items-center  mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="d-flex justify-content-center fs-4">Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{url('/')}}"
             class="nav-link text-white {{Request::is('/*') ? 'active' : ''}}" aria-current="page">
                <i class="fa-solid fa-house" style="color:white"></i> Home
            </a>
        </li>
        <li>
            <a href="{{url('product-dashboard')}}" 
             class="nav-link text-white {{Request::is('product-dashboard*') ? 'active' : ''}}">
                <i class="fa-solid fa-box" style="color:white;"></i> Products
            </a>
        </li>
        <li>
            <a href="{{url('category-dashboard')}}" 
             class="nav-link text-white {{Request::is('category-dashboard*') ? 'active' : ''}}">
                <i class="fa-solid fa-cube" style="color:white"></i> Category
            </a>
        </li>
        </ul>
        <hr>
        <div class="dropdown ">
        <a href="#" class="d-flex align-items-center justify-content-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user me-2 "> </i> <strong> {{auth()->user()->name}}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item" type="submit">Sign out</button>
            </form>
            {{-- <li><a class="dropdown-item" href="#">Sign out</a></li> --}}
        </ul>
        </div>
    </div>

