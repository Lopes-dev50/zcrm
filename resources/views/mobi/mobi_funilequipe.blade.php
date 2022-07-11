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
        <br>
         <div class="flex flex-nowrap" >
            <div class="basis-1 pr-1">
                <a href="{{route('mobi_funil_ativo_gerente','ativo')}}">
            <div class=" px-2 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
                <button type="button" class="text-md text-white text-1xl relative pb-4">
                    <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                    </svg>
                    <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                        {{count($quente)}}
                    </span>
                </button>
            </div>
                </a>
        </div>
            <div class="basis-1 pr-1">
                <a href="{{route('mobi_funil_parado_gerente','parado')}}">
            <div class=" px-1 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
                <button type="button" class="text-md text-white text-1xl relative pb-4">
                    <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                        {{count($frio)}}
                    </span>
                </button>
            </div>
                </a>
        </div>
        <div class="basis-1 pr-1">
            <a href="{{route('mobi_funil_doc_gerente','documentos')}}">
        <div class=" px-1 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
            <button type="button" class="text-md text-white text-1xl relative pb-4">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                  </svg>
                  <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                    @php
                    $count = 0;
                    foreach($produtos as $arr  )
                        if ("DOCUMENTOS" == $arr['nivel_cliente'])
                            $count++;
                    echo $count;
                       @endphp
                </span>
            </button>
        </div>
            </a>
    </div>
    <div class="basis-1 pr-1">
        <a href="{{route('mobi_funil_pen_gerente', 'pendencia')}}">
        <div class=" px-1 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
            <button type="button" class="text-md text-white text-1xl relative pb-4">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                  </svg>
                  <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                    @php
                    $count = 0;
                    foreach($produtos as $arr  )
                        if ("PENDENCIA" == $arr['nivel_cliente'])
                            $count++;
                    echo $count;
                       @endphp
                </span>
            </button>
        </div>
        </a>
    </div>
    <div class="basis-1 pr-1">
        <a href="{{route('mobi_funil_ana_gerente','analise')}}">
        <div class=" px-2 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
            <button type="button" class="text-md text-white text-1xl relative pb-4">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                      </svg>
                      <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                        @php
                        $count = 0;
                        foreach($produtos as $arr  )
                            if ("ANALISE" == $arr['nivel_cliente'])
                                $count++;
                        echo $count;
                           @endphp
                    </span>
            </button>
        </div>
        </a>
    </div>
    <div class="basis-1 pr-1">
        <a href="{{route('mobi_funil_vendido_gerente', 'vendido')}}">
        <div class=" px-2 py-2  text-base rounded-lg text-indigo-500 border border-indigo-500 ">
            <button type="button" class="text-md text-white text-1xl relative pb-4">
                <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24" class="text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                      </svg>
                      <span class="w-6 h-4 rounded-lg absolute right-2 leading text-xs bg-green-500">
                        @php
                        $count = 0;
                        foreach($produtos as $arr  )
                            if ("VENDIDO" == $arr['nivel_cliente'])
                                $count++;
                        echo $count;
                           @endphp
                    </span>
            </button>
        </div>
        </a>
    </div>
          </div>
   </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script type="text/javascript" charset="utf8"
                            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
                        <div class="container mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="p-8 border-b border-gray-200 shadow">
                                        <table class="divide-y divide-gray-300" id="dataTable">
                                            <thead class="bg-black">
                                                <tr>
                                                    <th class="px-6 py-2 text-xs text-white">
                                                      Lista
                                                    </th>
                                                  </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-300">
                                                @if(isset($clientes)) @foreach($clientes as $cli )
                                                <tr class="text-center whitespace-nowrap">
                                                    <td class="px-6 py-4 text-sm text-red-500">
                                                        <div class="text-lg text-gray-700">{{ $cli->corretor}}</div>
                                                        Atualizado -
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
                                                     <div class="text-xl text-gray-700">{{ $cli->nome_cliente}}</div>
                                                     <div class="text-xl text-gray-500">R${{ $cli->renda_cliente}}</div>
                                                     <div class="text-xl text-gray-500">{{ $cli->cidade_cliente}}</div>
                                                     <a href="#" class="inline-block text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$cli->id}}">
                                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                        </svg>
                                                        <div id="tooltip-default{{$cli->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                          {{$cli->conversa_cliente}}
                                                          <div class="tooltip-arrow" data-popper-arrow></div>
                                                      </div>
                                                  </a>
                                                  <hr>
                                                     </td>

                                                        </tr>
                                                        @endforeach @else  @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('#dataTable').DataTable();
                            } );
    $('#dataTable').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
    }

                            });
                        </script>
                <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
