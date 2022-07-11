<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Usuario X Imovel.</h3>
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
    </x-slot>
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
                                                    Cliente
                                                </th>
                                                <th class="px-6 py-2 text-xs text-white">
                                                    Renda
                                                 </th>
                                                <th class="px-6 py-2 text-xs text-white">
                                                   Interesse do cliente
                                                </th>
                                                <th class="px-6 py-2 text-xs text-white">
                                                   Imovel diponivel
                                                </th>

                                                 <th class="px-6 py-2 text-xs text-white">
                                                    Codigo Imovel
                                                  </th>

                                                <th class="px-6 py-2 text-xs text-white">
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                            @foreach ($par as $cli )

                                                @if ($cli->tipo = $cli->empreendimento_cliente)

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
                                                    {{ $cli->nome_cliente}}-{{ $cli->impar}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    R$ {{ $cli->renda_cliente}}
                                                 </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->empreendimento_cliente}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->nomeimovel}}
                                                </td>

                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{ $cli->cod}}
                                                 </td>

                                                <td class="px-6 py-4">
                                                     <div class="flex pl-4 ">
                                                     <div class="flex items-center mr-4 pr-4">
                                                        <a href="{{route('ver_par',['coduni' =>$enc->encriptar($cli->coduni) , 'cod' =>$enc->encriptar($cli->cod )],'ver_par')}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                              </svg>
                                                        </a>

                                                    </div>
                                                     </div>
                                                 </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                        </tbody>
                                    </table>
                                       <!-- Fim -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>

                        </section>
                    </div>
                  </div>
              </div>
           </div>
         </div>
</x-app-layout>


