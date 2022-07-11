<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Imoveis Anunciados.</h3>

    </x-slot>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="content-header">
                         <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                       <!-- inicio -->
                                       <table class="divide-y divide-gray-300" >
                                        <thead class="bg-black">
                                            <tr>
                                                <th class="px-6 py-2 text-xs text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                      </svg>
                                                </th>
                                                <th class="px-6 py-2 text-xs text-white">
                                                   Corretor
                                                </th>
                                                <th class="px-6 py-2 text-xs text-white">
                                                   Imovel
                                                </th>

                                                <th class="px-6 py-2 text-xs text-white">
                                                    Cod
                                                 </th>

                                                 <th class="px-6 py-2 text-xs text-white">
                                                   Estado do anuncio
                                                 </th>

                                                <th class="px-6 py-2 text-xs text-white">
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                             @foreach($anuncios as $cli )
                                            <tr class="text-center whitespace-nowrap">
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    @switch($h = \Carbon\Carbon::parse ($cli->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                                    @case(0)
                                                    Hoje
                                                        @break

                                                    @case(1)
                                                    Ontem
                                                        @break

                                                    @default
                                                  {{$h}} Dias
                                                 @endswitch
                                                </td>
                                                  <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->corretor}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->nomeimovel}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->cod}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    @switch($cli->ativo)
                                                        @case(0)
                                                            Parado
                                                            @break

                                                            @case(1)
                                                           Rodando
                                                            @break
                                                        @default
                                                    @endswitch
                                                </td>
                                                <td class="px-6 py-4">
                                                     <div class="flex pl-4 ">
                                                     <div class="flex items-center mr-4 pr-4">
                                                        <a href="{{route('del_anuncio',['id' =>$enc->encriptar($cli->imovel_id )],'del_anuncio')}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600""  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                              </svg>
                                                        </a>
                                                    </div>
                                                    <div class="flex items-center mr-4 pr-4">
                                                        <a href="{{route('ativa_anuncio',['id' =>$enc->encriptar($cli->imovel_id )],'ativa-anuncio')}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                              </svg>
                                                        </a>
                                                    </div>
                                                    <div class="flex items-center mr-4 pr-4">
                                                        <a href="{{route('para_anuncio',['id' =>$enc->encriptar($cli->imovel_id )],'para_anuncio')}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                              </svg>
                                                        </a>
                                                    </div>
                                                     </div>
                                                 </td>
                                                    </tr>
                                                    @endforeach
                                        </tbody>
                                    </table>
                                       <!-- Fim -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="md:block -mr-2 flex">
                                <form action="{{ route('busca_anuncio','busca_anuncio') }}" method="post" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                                    @csrf
                                    <div class=" relative ">
                                        <input type="text" name="cod" id="&quot;form-subscribe-Search" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Codigo"/>
                                        </div>
                                        <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" type="submit">
                                           Buscar
                                        </button>
                                    </form>
                                </div>
                                <br>
                                <div class="ml-4 flex items-center md:ml-6">
                                    @if(isset($imovel))
                                    @foreach ($imovel as $imovel )
                                    {{$imovel->nomeimovel}} -
                                    <a href="{{route('add_anuncio',['id' =>$enc->encriptar($imovel->id )],'add_anuncio')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                          </svg>
                                    </a>

                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                  </div>
              </div>
           </div>
         </div>
</x-app-layout>


