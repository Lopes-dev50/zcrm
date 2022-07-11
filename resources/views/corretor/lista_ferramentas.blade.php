<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
          @if(session()->get('success'))
          <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative" role="alert">
            <svg width="20" height="20" fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1216 1344v128q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64v-384h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h384q26 0 45 19t19 45v576h64q26 0 45 19t19 45zm-128-1152v192q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-192q0-26 19-45t45-19h256q26 0 45 19t19 45z">
                </path>
            </svg>
            <p>
            {{ session()->get('success') }}
          </div>
        @endif
        <p class="p-4 font-sans font-light text-xl text-gray-500">Ferramentas!</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
<div class="flex bg-white dark:bg-gray-800 rounded-lg shadow">
    <div class="flex-none w-24 md:w-48 bg-blue-500 relative">
    </div>
    <form class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold text-gray-300 dark:text-gray-200">
             Pagina de Captura
            </h1>
            <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">
            </div>
            <div class="w-full flex-none text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                <p class="text-sm text-gray-500 dark:text-gray-300">
                    Novos leads usando esta ferramenta uma pagina para captar novos clientes. só divulgar o link acima,<p class="text-sm text-gray-500 dark:text-gray-300"> o cliente interessado em comprar imóveis, vai preenchar cadastro e os dados irão para o seu e-mail e sua conta
                </p>
            </div>
        </div>
        <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
            <div class="space-x-2 flex">
                <label class="text-center">
                    <label class="text-center">
                        <label class="text-center">
                            <label class="text-center">
                                <label class="text-center">
                                </div>
                            </div>
                            @can('corretor')
                            @if ($corretor->pgcaptura != '')
                            <h1 class="flex-auto text-xl font-semibold dark:text-gray-400">
                            <a href="../../fm/{{ $corretor->pgcaptura }}" target="_blank">Link: fm/{{ $corretor->pgcaptura }}</a>
                            </h1>
                            @else
                            <div class="flex mb-4 text-sm font-medium">
                                <a href="{{route('pgcaptura',['id' =>$enc->encriptar(Auth::user()->id )],'formulario')}}">
                                    <button type="button" class="py-2 px-4 flex justify-center items-center  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                          </svg>
                                        Ativar
                                    </button>
                                </a>
                            </div>
                            @endif

                            <br>
                            @endcan
                            <div class="flex mb-4 text-sm font-medium">
                                @can('free')
                                <a href="#">
                                    <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Mudar para plano corretor
                                     </button>
                                    </a>
                                @endcan

                            </div>
                        </form>
                    </div>
                    <!------------->
<br>
<br>
<div class="flex bg-white dark:bg-gray-800 rounded-lg shadow">
    <div class="flex-none w-24 md:w-48 bg-orange-500 relative">
    </div>
    <div class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold text-gray-300 dark:text-gray-200">
               Site Padrão
            </h1>
            <div class="text-xl font-semibold text-gray-500 dark:text-gray-300">
            </div>
            <div class="w-full flex-none text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                <p class="text-sm text-gray-500 dark:text-gray-300">
                    Antes de gerar seu site cadastre os imóvies. Agora pode conseguiu novos leads e vender seus imóveis<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> usando esta ferramenta para gerar um site para captar novos clientes. só divulgar o link abaixo.
                </p><p class="mb-3 font-normal text-gray-700 dark:text-gray-400">NÃO USAR ACENTOS LETRAS MAISCULAS OU CARACTERES ESPECIAIS.
                </p>
            </div>
        </div>
        <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
            <div class="space-x-2 flex">
                <label class="text-center">
                    <label class="text-center">
                        <label class="text-center">
                            <label class="text-center">
                                <label class="text-center">
                                </div>
                            </div>
                            <div class="flex mb-4 text-xl font-semibold text-gray-300 dark:text-gray-200">
                                @can('corretor')
                                @if ($corretor->subdomain != '')
                              <a href="https://www.{{ $corretor->subdomain }}.crmcorretor.com.br" >
                                {{ $corretor->subdomain }}.crmcorretor.com.br</a>
                                <p>
                                    <br>
                                    <br>
<a href="{{ route('configura_site',['id' =>$enc->encriptar(Auth::user()->id )],'configura_site') }}">
<button type="button" class="py-2 px-4 flex justify-center items-center  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
    <svg width="20" height="20" class="mr-2" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
        <path d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
        </path>
    </svg>
    Configurar Site
</button>
</a>
                             @else
                                  <form action="{{ route('gerasite')}}" method="post">
                                       @csrf
                                       <div>
                                        <input type="text" id="site" name="site" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nome">

                                       </div>
                                       <br>
                                       <div>
                                        <button type="submit" class="py-2 px-4 bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Ativar
                                        </button>
                                       </div>
                                     </form>
                             @endif
                             @endcan
                            </div>
                            <div class="flex mb-4 text-sm font-medium">
                                @can('free')
                                <a href="#">
                                    <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Mudar para plano corretor
                                     </button>
                                    </a>
                                @endcan
                            </div>

                        </div>
                    </div>
                    <!-------------->
<br>
<br>
<div class="flex bg-white dark:bg-gray-800 rounded-lg shadow">
    <div class="flex-none w-24 md:w-48 bg-green-500 relative">
    </div>
    <form class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold text-gray-300 dark:text-gray-200 ">
               Relatorio em Excel
            </h1>
            <div class="text-xl font-semibold text-green-500 dark:text-gray-300">

            </div>
            <div class="w-full flex-none text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                Pode baixar todos seus clientes cadastratos em uma planilha Excel
            </div>
        </div>
        <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
            <div class="space-x-2 flex">
                <label class="text-center">
                    <label class="text-center">
                        <label class="text-center">
                              <label class="text-center">
                                  <label class="text-center">
                                   </div>

                            </div>
                            @can('corretor')

                           <div class="flex mb-4 text-sm font-medium">
                           <a href="{{route('add_excel',['id' =>$enc->encriptar(Auth::user()->id )],'export')}}">
                            <button type="button" class="py-2 px-4 flex justify-center items-center  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                  </svg>
                                Baixar
                            </button>
                           </a>
                        </div>
                            @endcan
                            <div class="flex mb-4 text-sm font-medium">
                                @can('free')
                                <a href="#">
                                    <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        Mudar para plano corretor
                                     </button>
                                    </a>
                                @endcan
                            </div>

                            <p class="text-sm text-gray-500 dark:text-gray-300">

                            </p>
                        </form>
                    </div>
<!------------>
<br>
<br>
<div class="flex bg-white dark:bg-gray-800 rounded-lg shadow">
    <div class="flex-none w-24 md:w-48 bg-purple-500 relative">
    </div>
    <div class="flex-auto p-6">
        <div class="flex flex-wrap">
        </div>
        <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
            <div class="space-x-2 flex">

                                     <!----------inicio------>
                   <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-2xl font-normal leading-none text-gray-400 dark:text-gray-500">O sistema envia automaticamente e-mail para os clientes parados:</time>
                    <br>
                    </li>
                        <li class="mb-10 ml-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">31 dias</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Meu novo site de imóveis</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Convidando o cliente para visitar seu site, e ver seus imóveis.</p>
                            </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">60 dias</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Novos imoveis</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Acaba de chegar novo imóvel, talvez seja o que esta procurando.</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">90 dias</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Deixa eu ajudar você, encontrar seu imóvel</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Caso não tenha encontrato, deixa eu ajudar você, acessa meu site, Tem um formulario preencha com as carteristicas do imóvel que procura.</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">150 dias</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Novos imoveis, Acredito que vai gostar</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Pode ser que goste de algum caso ainda não tenha encontrado.</p>
                    </li>
                    <li class="ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">180 dias</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Procurando imóvel ainda ?</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Tenho novidades no meu site.</p>
                    </li>

                </ol>
                   <!-----------fim-------->

                            @can('free')
                            <a href="#">
                                <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Mudar para plano corretor
                                 </button>
                                </a>
                            @endcan
                            <p class="text-sm text-gray-500 dark:text-gray-300">

                            </p>
                        </div>
                    </div>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
