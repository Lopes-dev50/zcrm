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
     <div>
            </div>
   </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <div class="flex flex-row">
                    <div class="basis-1/2">
                        <div class="flex flex-wrap">
                            @foreach ($imovel as $imoveis )
                            <div class="flex mt-2 pr-4 ">
                             <div class=" basis-1/4 p-3">
                                @switch($imoveis->anuncio)
                                    @case(0)
                                    <div class=" bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-gray-800 dark:border-gray-700  ">
                                        @break
                                        @case(1)
                                        <div class=" bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-green-800 dark:border-green-700  ">
                                        @break
                                    @default
                                @endswitch
                                    <button class='relative  font-bold overflow-hidden'>
                                    <img class="rounded-t-lg " src="{{ asset("storage/$imoveis->fotocapa") }}" width="335" height="200" alt="">
                                    @switch($imoveis->plantapronto)
                                    @case('PRONTO')
                                    <div class="ribbon bg-green-500 text-center  text-sm whitespace-no-wrap px-4">  {{$imoveis->plantapronto}}</div>
                                        @break
                                        @case('PLANTA')
                                        <div class="ribbon bg-blue-500 text-center text-sm whitespace-no-wrap px-4">  {{$imoveis->plantapronto}}</div>
                                        @break
                                        @case('CONSTRUÇÃO')
                                        <div class="ribbon bg-green-500 text-center text-sm whitespace-no-wrap px-4">  {{$imoveis->plantapronto}}</div>
                                        @break
                                    @default
                                @endswitch
                                </button>
                                    <div class="p-3 mb-4">
                                        <div class="flex flex-row">
                                            <div class="mr-2"></div>
                                            <div class="basis-1/2">
                                                <p class="mb-2 text-1xl text-center font-bold tracking-tight text-gray-900 dark:text-white">{{$imoveis->cidade}} - {{$imoveis->estado}}</p>
                                        </div>
                                        <div class="mr-2"></div>
                                        <div class="basis-1/2">
                                            <h5 class="mb-2 text-1xl text-center  font-bold tracking-tight text-gray-900 dark:text-white"><span class="text-gray-400">{{$imoveis->nomeimovel}}</span></h5>
                                        </div>
                                        </div>
                                        <hr>
                                        <br>
                                    @switch($imoveis->locarvender)
                                    @case('ALUGAR')
                                    <div class="flex flex-row">
                                        <div class="mr-2"></div>
                                        <div class="basis-1/2">
                                            <h5 class="mb-2 text-1xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">{{$imoveis->locarvender}}</h5>
                                    </div>
                                    <div class="mr-2"></div>
                                    <div class="basis-1/2">
                                        <h5 class="mb-2 text-1xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">R$ <span class="text-gray-400">{{$imoveis->valor}}</span></h5>
                                    </div>
                                    </div>
                                         @break
                                    @case('VENDER')
                                    <div class="flex flex-row">
                                        <div class="mr-2"></div>
                                        <div class="basis-1/2">
                                            <h5 class="mb-2 text-1xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">{{$imoveis->locarvender}}</h5>
                                    </div>
                                    <div class="mr-2"></div>
                                    <div class="basis-1/2">
                                        <h5 class="mb-2 text-1xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">R$ <span class="text-gray-400">{{$imoveis->valor }}</span></h5>
                                    </div>
                                    </div>
                                    @break
                                    @default
                                @endswitch
                                <hr>
                                <br>
                                <div class="flex flex-row">
                                    <div class="mr-2"></div>
                                    <div class="basis-1/2">
                                   <h5 class="mb-2 text-1xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">Visitas: <span class="text-gray-400">{{$imoveis->visitas}}</span></h5>
                                </div>
                                <div class="mr-2"></div>
                                <div class="basis-1/4">
                                    <h5 class="m-2 text-1xl font-bold text-lest  tracking-tight text-gray-900 dark:text-white">Cod: <span class="text-gray-400">{{$imoveis->cod}}</span></h5>
                                </div>
                                </div>
                                <hr>
                                <br>
                                    <div class="flex pl-2 ">
                                        <div class="mr-4"></div>
                                        <div class="flex items-center mr-2 pr-2 pl-2 text-sm text-gray-100">
                                            {{$imoveis->quartos}} Quartos
                                        </div>
                                        <div class="flex items-center  mr-2 pr-2 text-sm text-gray-100">
                                            {{$imoveis->banheiros}} Banheiros
                                        </div>

                                        <div class="flex items-center  mr-2 pr-2 text-sm text-gray-100">
                                            {{$imoveis->metragem}} Metragem
                                        </div>

                                       </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                              </div>
                            </div>
                              <div>

                    </div>
                    <div class="basis-1/2">
                        @foreach ($clientes as $cliente )
                    <h1 class="mr-4 pt-4 text-2xl font-bold text-left  tracking-tight text-gray-900 ">Cliente</h1>
                      <p class="mb-2 pt-4text-1xl font-bold text-left  tracking-tight text-gray-600 ">{{$cliente->nome_cliente}}</p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Cidade: {{$cliente->cidade_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Bairro de interesse: {{$cliente->bairro_interesse_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Renda: R$ {{$cliente->renda_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">FGTS: R$ {{$cliente->fgts_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Celular: {{$cliente->celular_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Email: {{$cliente->email_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Classificado: {{$cliente->nivel_cliente}} </p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Situação: {{$cliente->spc_cliente}} </p>
                     <br>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Historico: {{$cliente->conversa_cliente}} </p>

                    <div class="flex flex-row">
                    <hr>
                    <br>
                        </div>
                    @endforeach
                    <hr>
                    <div class="basis-1/4">

                        @foreach ($clientes as $cliente )
                        <a href="{{route('impar',['id' =>$enc->encriptar($cliente->id) ],'impar')}}" class="inline-block text-center">
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                               Separar
                            </button>
                          </a>
                          <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($cliente->id) ],'edit')}}" class="inline-block text-center">
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                               Editar Cliente
                            </button>
                          </a>
                          @if($cliente->email_cliente != '')
                          <a href="{{route('add_par_markting', ['coduni' =>$enc->encriptar($cliente->coduni) , 'cod' =>$enc->encriptar($imoveis->cod )],'add_par_markting')}}" class="inline-block text-center">
                            <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                              Enviar imovel por e-mail
                            </button>
                          </a>
                          @else
                          @endif
                          @if($cliente->controle_cliente != '0')
              @else
              <a href="{{route('funilmaisum',['id' =>$enc->encriptar($cliente->id) ],'funilmaisum')}}" class="inline-block text-center">
                <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Enviar para Call
                </button>
              </a>
              @endif
              @if ($cliente->celular_cliente != '')
              <a href="https://wa.me/55<?php   $var1 = $cliente->celular_cliente;
              $var1 = str_replace ("-" , "", $var1 );
              $var1 = str_replace ("(" , "", $var1 );
              $var1 = str_replace (")" , "", $var1 );
              $var1 = str_replace ("." , "", $var1 );
              $var1 = str_replace (" " , "", $var1 );
              echo    $var1; ?>?text={{ session ('corretor')}}"  target="_blank" class="inline-block text-center" >
               <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
               Enviar WhatsApp
            </button>
              </a>
               @else

              @endif
              @endforeach
                    </div>
                  </div>
                    <style>
                      .ribbon {
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 220px;
                        height: 22px;
                        margin-right: -50px;
                        margin-top: 34px;
                        -ms-transform: rotate(45deg); /* IE 9 */
                        -webkit-transform: rotate(45deg); /* Safari prior 9.0 */
                        transform: rotate(45deg); /* Standard syntax */
                      }
                    </style>
                    <br>
                    <br>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
