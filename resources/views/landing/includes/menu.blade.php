<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-5">
                <a href="{{ route('sitio.index') }}">
                <img src="/assets/img/logo.png" class="logo" alt></img>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="{{ route('sitio.index') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link text-dark"  href="{{ route('sitio.habitaciones') }}">Habitaciones</a></li>
                        <li class="nav-item"><a class="nav-link text-dark"  href="{{ route('sitio.contactanos') }}">Contáctanos</a></li>
                        <li class="nav-item"><a class="nav-link text-dark"  href="{{ route('sitio.servicios') }}">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link text-dark"  href="{{ route('sitio.nosotros') }}">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link text-dark"  href="{{ route('sitio.reserve') }}">Reserve</a></li>
                    </ul>
                </div>
            </div>
        </nav>