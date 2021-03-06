<nav class="bg-white navbar navbar-expand-md navbar-light border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="/">
            <x-jet-application-mark width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                {{-- <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"> --}}
                <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{-- {{ __('Dashboard') }} --}}
                    Home
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('clientes2.index') }}" :active="request()->routeIs('clientes.index')">
                    Clientes
                </x-jet-nav-link>


                <x-jet-nav-link href="{{ route('articulos.index' ) }}" :active="request()->routeIs('articulos.index')">
                    Articulos
                </x-jet-nav-link>

                {{-- <x-jet-nav-link href="{{ route('articulos.index' ) }}" :active="request()->routeIs('articulos.index')">
                    Articulos2
                </x-jet-nav-link> --}}


                <x-jet-nav-link href="{{ route('categorias.index') }}" :active="request()->routeIs('categorias.index')">
                    Cagegorias
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('estados.index') }}" :active="request()->routeIs('estados.index')">
                    Estados
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('cambiarestados.index') }}" :active="request()->routeIs('ots.ot')">
                    Cambiar Estados
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('planchado') }}" :active="request()->routeIs('ots.ot')">
                    Orden Planchado
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('ots.ot') }}" :active="request()->routeIs('ots.ot')">
                    Ordenes de Trabajo
                </x-jet-nav-link>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else                   {{-- <a href="{{ route('login') }}" class="text-muted">Login</a>
                    <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a> --}}
                    <x-jet-nav-link href="{{ route('login' ) }}" :active="request()->routeIs('login')">
                        Login
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('register' ) }}" :active="request()->routeIs('register')">
                        Registro
                    </x-jet-nav-link>
                @endauth
            </ul>
        </div>
    </div>
</nav>
