<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

            <!-- Application buttons -->
            <x-nav-link :href="route('frees','frees')" :active="request()->routeIs('frees')" class="btn btn-app bg-dark ">
                <span class="badge bg-warning">{{count($free)}}</span>  <i class="fas fa-users"></i>Free
            </x-nav-link>

            <x-nav-link :href="route('corretors','corretors')" :active="request()->routeIs('corretors')" class="btn btn-app bg-danger ">
                <span class="badge bg-warning">{{count($corretor)}}</span> <i class="fas fa-users"></i>Corretores
            </x-nav-link>

            <x-nav-link :href="route('gerentes','gerentes')" :active="request()->routeIs('gerentes')" class="btn btn-app bg-info">
                <span class="badge bg-warning">{{count($gerente)}}</span> <i class="fas fa-users"></i> Gerentes
            </x-nav-link>
            <x-nav-link :href="route('pagante','pagante')" :active="request()->routeIs('pagante')" class="btn btn-app bg-success">
                <span class="badge bg-warning">{{count($pagante)}}</span> <i class="fas fa-users"></i> Pagantes
            </x-nav-link>
            <x-nav-link :href="route('lista_geral','lista_geral')" :active="request()->routeIs('lista_geral')" class="btn btn-app bg-success">
                <span class="badge bg-warning">{{count($tudo)}}</span> <i class="fas fa-users"></i> Total
            </x-nav-link>




</div>
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div><br />
@endif
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="d-grid gap-2">





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
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                                              </svg>
                                                                        </th>


                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                           CORRETOR
                                                                        </th>

                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                            EMAIL
                                                                        </th>
                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                            CELULAR
                                                                        </th>
                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                            CIDADE
                                                                        </th>
                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                           SITE
                                                                        </th>
                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                           PLANO
                                                                         </th>
                                                                        <th class="px-6 py-2 text-xs text-white">
                                                                            Ações
                                                                        </th>

                                                                    </tr>
                                                                </thead>

                                                                <tbody class="bg-white divide-y divide-gray-300">
                                                                    @if(isset($tudo)) @foreach($tudo as $cli )
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

                                                                        <td class="px-6 py-4">
                                                                            <div class="text-sm text-gray-500">{{ $cli->name}}</div>
                                                                        </td>
                                                                        <td class="px-6 py-4">
                                                                            <div class="text-sm text-gray-500">{{ $cli->email}}</div>
                                                                        </td>
                                                                          <td class="px-6 py-4 text-sm text-gray-500">
                                                                            {{ $cli->celular}}
                                                                        </td>
                                                                    </td>
                                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                                      {{ $cli->cidade}}
                                                                  </td>

                                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                                            {{ $cli->subdomain}}
                                                                        </td>
                                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                                            {{ $cli->plano}}
                                                                        </td>
                                                                        <td class="px-6 py-4">

                                                                            <a href="#" class="inline-block text-center">

                                                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$cli->id}}">
                                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                                              </svg>
                                                                              <div id="tooltip-default{{$cli->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                                                {{$cli->conversa_cliente}}
                                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                                            </div>
                                                                        </a>
                                                                        <a href="{{route('add_admin_corretor',['id' =>$enc->encriptar($cli->id) ],'edit')}}" class="inline-block text-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                                              </svg>
                                                                        </a>

                                                                        <a href="{{route('add_admin_gerente',['id' =>$enc->encriptar($cli->id) ],'edit')}}" class="inline-block text-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                                                              </svg>
                                                                        </a>
                                                                        <a href="{{route('adminlistaimovel',['id' =>$enc->encriptar($cli->id) ],'adminlistaimovel')}}" class="inline-block text-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                              </svg>
                                                                        </a>

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


                            </div>
                            </div>
                            </div>
                            </div>
                    </x-app-layout>

