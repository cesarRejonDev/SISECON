<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px"
                height="60.75px" viewBox="0 0 80 60.75" style="overflow:visible;enable-background:new 0 0 80 60.75;" xml:space="preserve">
                <style type="text/css">
                .st0{opacity:0.959;fill-rule:evenodd;clip-rule:evenodd;fill:#fff;enable-background:new    ;}
                .st1{opacity:0.956;fill-rule:evenodd;clip-rule:evenodd;fill:#fff;enable-background:new    ;}
                .st2{opacity:0.941;fill-rule:evenodd;clip-rule:evenodd;fill:#fff;enable-background:new    ;}
                </style>
                <defs>
                </defs>
                <g>
                <g>
                <path class="st0" d="M79.57,0c0.21,0.04,0.39,0.17,0.43,0.43c-4.75,5.95-9.75,11.72-14.97,17.33c-12.79,3.04-25.63,5.82-38.5,8.34
                    c-3.59,10.48-7.44,20.92-11.55,31.23c-0.21,0.3-0.51,0.51-0.86,0.64c-4.49,0.86-8.98,1.8-13.48,2.78
                    c-0.21-0.13-0.43-0.3-0.64-0.43c5.18-13.56,10.44-27.04,15.83-40.43C37.18,13.43,58.44,6.8,79.57,0z"/>
                </g>
                <g>
                <path class="st1" d="M59.89,20.53c0.86-0.09,1.71,0,2.57,0.21c-5.39,6.42-10.95,12.66-16.68,18.82c-7.53,0.9-15.1,1.54-22.67,1.93
                    c1.58-4.58,3.12-9.11,4.71-13.69C38.59,25.58,49.28,23.14,59.89,20.53z"/>
                </g>
                <g>
                <path class="st2" d="M38.93,41.93c1.58-0.09,3.12,0,4.71,0.21c-3.34,3.98-6.76,7.91-10.27,11.76c-5.35,1.41-10.78,2.57-16.26,3.42
                    c1.58-4.58,3.12-9.11,4.71-13.69C27.59,43.25,33.33,42.65,38.93,41.93z"/>
                </g>
                </g>
                </svg>

            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2 fs-4">INTEC&<span class="text-danger">FOR<span></span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle text-danger"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="{{ request()->is('home*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>
                    Panel de control
                </div>
            </a>
        </li>
        <li class="{{ request()->is('duties*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('duties.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div>
                    Consignas
                </div>
            </a>
        </li>
        <li class="{{ request()->is('dutyTypes*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('dutyTypes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div>
                    Tipos de consigna
                </div>
            </a>
        </li>
        <li class="{{ request()->is('clients*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('clients.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div>
                    Clientes
                </div>
            </a>
        </li>
        <li class="{{ request()->is('tags*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('tags.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div>
                    Tipos de cliente
                </div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Administración</span>
        </li>
        <li class="{{ request()->is('users*') ? 'menu-item active' : 'menu-item' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>
                    Usuarios
                </div>
            </a>
        </li>
    </ul>
</aside>
