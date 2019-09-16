<div class="header">
    <nav class="container">
        <div class="flex items-center justify-start w-1/6 flex-shrink-0 text-white md:w-1/2">
            <a href="/"><img id="logo" class="md:mr-6" src="/media/logos/Firespring-icon-wht_298px.png"></a>
            <a href="/" class="font-semibold text-xl tracking-tight hidden md:block">Interactive Client Database</a>
        </div>

        <div class="flex items-center justify-end w-5/6 flex-grow lg:w-auto text-white md:w-1/2">
            <ul class="nav navbar-nav navbar-right items-center">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else

                    <div id="nav-search" class="md:flex justify-between items-center mr-3 nav-search-bar hidden" tabindex="0">
                        <i class="fa fa-2x fa-search mr-1"></i>
                        <div class="control dropdown">
                            <input type="text" placeholder="Search..." id="addSearchResults" data-toggle="dropdown">
                            <div class="dropdown-menu search-results" aria-labelledby="addSearchResults">
                                <h6 class="dropdown-header">Clients</h6>
                                <div class="nav-clients-results dropdown-item ">
                                    <p class="small">No results found.</p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Sites</h6>
                                <div class="nav-sites-results dropdown-item ">
                                    <p class="small">No results found.</p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Projects</h6>
                                <div class="nav-projects-results dropdown-item ">
                                    <p class="small">No results found.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mr-3 items-center">
                        <div class="dropdown">
                            <button class="button btn-add dropdown-toggle btn-blue" type="button" id="addMenuButton" data-toggle="dropdown"><i class="fa fa-plus"></i></button>
                            <div class="dropdown-menu center-drop" aria-labelledby="addMenuButton">
                                <h6 class="dropdown-header">Create New</h6>
                                <button class="dropdown-item" data-toggle="modal" data-target="#newClientMenuModal">Client</button>
                                <button class="dropdown-item" data-toggle="modal" data-target="#newSiteMenuModal">Site</button>
                                <button class="dropdown-item" data-toggle="modal" data-target="#newProjectMenuModal">Project</button>
                            </div>
                        </div>
                    </div>

                    <div class="mr-3 items-center">
                        <a href="/settings"><i class="fa fa-2x fa-cog mr-1"></i></a>
                    </div>

                    <li class="dropdown items-center flex">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32" style="margin-right: 8px;">
                            @else
                                {{ Auth::user()->name }} <span class="caret"></span>
                            @endif

                        </a>

                        <ul class="dropdown-menu right-drop">
                            <li>
                                <a class="dropdown-item text-sm" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>

<div class="sub-nav">
    <a class="mx-3 headline-lead" href="/clients">Clients</a>
    <a class="mx-3 headline-lead" href="/projects">Projects</a>
    <a class="mx-3 headline-lead" href="/sites">Sites</a>
    <a class="mx-3 headline-lead" href="/domains">Hosted Domains</a>
</div>

