<header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                {{-- <span>RDSE</span> --}}
                <img src="{{asset('img/rdseLogo.png')}}" alt="image">
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" id="nav__list">
                    <li>
                        <a href="{{ route('accueil.index') }}#home" class="nav__link">Accueil </a>
                    </li>
                    <li>
                        <a href="{{ route('accueil.index') }}#about" class="nav__link">À propos de nous</a>
                    </li>
                    <li>
                        <a href="{{ route('accueil.index') }}#services" class="nav__link">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('accueil.index') }}#projects" class="nav__link">Projets</a>
                    </li>
                    <li>
                        <a href="{{ route('accueil.index') }}#contact" class="nav__link">Contactez-nous</a>
                    </li>

                    {{-- Mobile Connected button  --}}

                    <div class="d-lg-none nav__list">
                    @guest
                        <li>
                            <a href="{{ route('login') }}" id="nav__button" class="nav__button">Se Connecter</a>
                        </li>
                    @endguest
                    @auth
                        <li><a href="{{route('user.profile')}}" class="nav__link">Mon Profile</a></li>

                        @if(auth()->user()->role !== 'admin')
                        <li><a href="{{route('user.consultation.index')}}" class="nav__link">Mes Consultations</a></li>
                        <li><a href="{{route('user.offers.index')}}" class="nav__link">Mes Offres</a></li>
                        @endif

                        <li>
                            <a href="{{ route('login.logout') }}" id="nav__button" class="nav__button logout_btn">Déconnexion</a>
                        </li>
                    @endauth
                    </div>

                    {{--  DESKTOP  --}}
                   <div class="d-none d-lg-block">
                       @guest
                            <a href="{{ route('login') }}" id="nav__button" class="nav__button">Se Connecter</a>
                       @endguest

                       @auth
                        <div class="dropdown">
                             <button class="btn btn-primary dropdown-toggle btname nav__button" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 {{ auth()->user()->firstname }}
                             </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" href="{{route('user.profile')}}">Mon Profile</a></li>

                                 @if(auth()->user()->role !== 'admin')
                                 <li><a class="dropdown-item" href="{{route('user.consultation.index')}}">Mes Consultations</a></li>
                                 <li><a class="dropdown-item" href="{{route('user.offers.index')}}">Mes Offres</a></li>
                                 @endif

                                 <li><a class="dropdown-item text-danger log-out" href="{{ route('login.logout') }}">
                                    <i class="ri-logout-box-r-line"></i>Déconnexion
                                </a></li>
                            </ul>
                        </div>
                       @endauth
                    </div>

                </ul>
                {{-- Close button --}}
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-large-line"></i>
                </div>

            </div>
            {{-- Toggle Menu --}}
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-apps-2-line"></i>
                </div>
        </nav>
    </header>
