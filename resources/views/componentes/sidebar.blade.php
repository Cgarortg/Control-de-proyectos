<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="./index.html" class="brand-link">
            <img
              src="adminLTE3/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">SO</span>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
              >
              <li class="nav-header">Soluciones informaticas</li>
              @guest
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                      Inicio
                    </p>
                  </a>
                </li> 
              @endguest
              @auth
                @if(Auth::user()->tipo == 'NORMAL')
                  @include('usuario.sidebar')
                @elseif(Auth::user()->tipo == 'ADMINISTRADOR')
                  @include('admin.sidebar')
                @elseif(Auth::user()->tipo == 'ROOT')
                  @include('root.sidebar')
                @endif
              @endauth

              
            </ul>
          </nav>
        </div>
      </aside>