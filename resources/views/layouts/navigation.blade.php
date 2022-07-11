<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset("imgSite/logo_crm.png") }}" class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                @php
                $enc = new App\Classes\Enc;
                @endphp
                <!-- Navigation Links -->
                @can('free')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Free') }}
                    </x-nav-link>
                    <x-nav-link :href="route('agenda_cliente')" :active="request()->routeIs('agenda_cliente')">
                        {{ __('Agenda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('funil')" :active="request()->routeIs('funil')">
                        {{ __('Funil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('pepino', 'pepino')" :active="request()->routeIs('pepino')">
                        {{ __('Call') }}
                    </x-nav-link>
                    <x-nav-link :href="route('grafico_cliente', 'grafico_cliente')" :active="request()->routeIs('grafico_cliente')">
                        {{ __('Grafico') }}
                    </x-nav-link>
                    <x-nav-link :href="route('suporte')" :active="request()->routeIs('suporte')">
                        {{ __('Suporte') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ferramentas','index')" :active="request()->routeIs('ferramentas')">
                        {{ __('Ferramentas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('escolherPlano', 'escolherPlano')" :active="request()->routeIs('escolherPlano')">
                        {{ __('Imovel') }}
                    </x-nav-link>
                    <x-nav-link :href="route('escolherPlano')" :active="request()->routeIs('escolherPlano')">
                        {{ __('Tinder') }}
                    </x-nav-link>
                    <x-nav-link :href="route('escolherPlano')" :active="request()->routeIs('escolherPlano')">
                        {{ __('Filtro') }}
                    </x-nav-link>

                </div>

                @endcan
                @can('corretor')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Corretor') }}
                    </x-nav-link>
                    <x-nav-link :href="route('agenda_cliente')" :active="request()->routeIs('agenda_cliente')">
                        {{ __('Agenda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('funil')" :active="request()->routeIs('funil')">
                        {{ __('Funil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('pepino', 'pepino')" :active="request()->routeIs('pepino')">
                        {{ __('Call') }}
                    </x-nav-link>
                    <x-nav-link :href="route('grafico_cliente', 'grafico_cliente')" :active="request()->routeIs('grafico_cliente')">
                        {{ __('Grafico') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ferramentas','index')" :active="request()->routeIs('ferramentas')">
                        {{ __('Ferramentas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('list_imovel', 'index')" :active="request()->routeIs('list_imovel')">
                        {{ __('Imovel') }}
                    </x-nav-link>
                    <x-nav-link :href="route('par', 'par')" :active="request()->routeIs('par')">
                        {{ __('Tinder') }}
                    </x-nav-link>
                    <x-nav-link :href="route('suporte')" :active="request()->routeIs('suporte')">
                        {{ __('Suporte') }}
                    </x-nav-link>
                    <x-nav-link :href="route('site')" :active="request()->routeIs('site')">
                        {{ __('site') }}
                    </x-nav-link>

                    <x-nav-link :href="route('funil2')" :active="request()->routeIs('funil2')">
                        {{ __('Filtro') }}
                    </x-nav-link>

                </div>

                @endcan
                @can('gerente')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('add_gerarelatorio','add_gerarelatorio')" :active="request()->routeIs('add_gerarelatorio')">
                    {{ __('EQUIPE') }}
                </x-nav-link>
                <x-nav-link :href="route('lista_agenda','lista_agenda')" :active="request()->routeIs('lista_agenda')">
                    {{ __('AGENDA EQUIPE') }}
                </x-nav-link>
                <x-nav-link :href="route('funil_equipe','funil_equipe')" :active="request()->routeIs('funil_equipe')">
                    {{ __('FUNIL EQUIPE') }}
                </x-nav-link>
                <x-nav-link :href="route('ListaImovelEquipe', 'ListaImovelEquipe')" :active="request()->routeIs('ListaImovelEquipe')">
                    {{ __('IMÓVEIS EQUIPE') }}
                </x-nav-link>
                <x-nav-link :href="route('suporte')" :active="request()->routeIs('suporte')">
                    {{ __('SUPORTE') }}
                </x-nav-link>
                <x-nav-link  :href="route('gerente','index')" :active="request()->routeIs('gerente')">
                    {{ __('ESTATISTICA') }}
                </x-nav-link >
                <x-nav-link :href="route('busca_corretor','busca_corretor')" :active="request()->routeIs('busca_corretor')">
                    {{ __('CORRETORES') }}
                </x-nav-link>
                <x-nav-link :href="route('add_leads_gerente','add_leads_gerente')" :active="request()->routeIs('add_leads_gerente')">
                    {{ __('ENVIAR LEADS') }}
                </x-nav-link>
                </div>
                @endcan
                @can('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('admin','admin')" :active="request()->routeIs('admin')">
                    {{ __('HOME') }}
                </x-nav-link>
                <x-nav-link :href="route('lista_geral','lista_geral')" :active="request()->routeIs('lista_geral')">
                    {{ __('LISTA') }}
                </x-nav-link>
                <x-nav-link :href="route('info','info')" :active="request()->routeIs('info')">
                    {{ __('INFO') }}
                </x-nav-link>
                <x-nav-link :href="route('plano', 'plano')" :active="request()->routeIs('plano')">
                    {{ __('PLANO') }}
                </x-nav-link>
                <x-nav-link :href="route('list_suporte', 'list_suporte')" :active="request()->routeIs('list_suporte')">
                    {{ __('SUPORTE') }}
                </x-nav-link>

                <x-nav-link :href="route('grafico_mes', 'grafico_mes')" :active="request()->routeIs('grafico_mes')">
                    {{ __('GRAFICO') }}
                </x-nav-link>
                <x-nav-link :href="route('banner', 'banner')" :active="request()->routeIs('banner')">
                    {{ __('BANNER') }}
                </x-nav-link>
                <x-nav-link :href="route('emailTodos', 'emailTodos')" :active="request()->routeIs('emailTodos')">
                    {{ __('EMAIL') }}
                </x-nav-link>
                <x-nav-link :href="route('anuncio', 'anuncio')" :active="request()->routeIs('anuncio')">
                    {{ __('ANUNCIOS') }}
                </x-nav-link>
                <x-nav-link :href="route('busca', 'busca')" :active="request()->routeIs('busca')">
                    {{ __('MIGRA') }}
                </x-nav-link>
                <x-nav-link :href="route('jobs', 'jobs')" :active="request()->routeIs('jobs')">
                    {{ __('JOBS') }}
                </x-nav-link>
                <x-nav-link :href="route('crmlogs')" :active="request()->routeIs('crmlogs')">
                    {{ __('LOGS') }}
                </x-nav-link>
                @endcan

                @can('renova')

                @endcan



            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('painel', ['id' =>$enc->encriptar( Auth::user()->id )], 'painel') }}">
                            @csrf

                            <x-dropdown-link :href="route('painel', ['id' =>$enc->encriptar( Auth::user()->id )], 'painel')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Painel!') }}
                            </x-dropdown-link>
                        </form>
                        <!-------notificar------>
                        <form method="POST" action="{{ route('ativanot', ['id' =>$enc->encriptar( Auth::user()->id )], 'ativanot') }}">
                            @csrf

                            <x-dropdown-link :href="route('ativanot', ['id' =>$enc->encriptar( Auth::user()->id )], 'ativanot')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Notificações!') }}
                            </x-dropdown-link>
                        </form>

                        <form method="POST" action="{{ route('escolherPlano', 'escolherPlano') }}">
                            @csrf

                            <x-dropdown-link :href="route('escolherPlano',  'escolherPlano')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Mudar de Plano!') }}
                            </x-dropdown-link>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('SAIR') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      @can('corretor')


        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('mobi_funil')" :active="request()->routeIs('funil')">
                {{ __('Funil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mobi_agenda_cliente')" :active="request()->routeIs('mobi_agenda_cliente')">
                {{ __('Agenda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mobi_list_imovel', 'index')" :active="request()->routeIs('mobi_list_imovel')">
                {{ __('Imovel') }}
            </x-responsive-nav-link>
        </div>
        @endcan
        @can('gerente')

        <x-responsive-nav-link :href="route('mobi_lista_agenda','mobi_lista_agenda')" :active="request()->routeIs('mobi_lista_agenda')">
            {{ __('AGENDA EQUIPE') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('mobi_funil_equipe','mobi_funil_equipe')" :active="request()->routeIs('mobi_funil_equipe')">
            {{ __('FUNIL EQUIPE') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('mobi_busca_corretor','mobi_busca_corretor')" :active="request()->routeIs('mobi_busca_corretor')">
            {{ __('CORRETORES') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('mobi_add_leads_gerente','mobi_add_leads_gerente')" :active="request()->routeIs('mobi_add_leads_gerente')">
            {{ __('ENVIAR LEADS') }}
        </x-responsive-nav-link>
        @endcan
        @can('renova')

        @endcan
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('SAIR') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
