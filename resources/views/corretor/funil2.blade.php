<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
         <div class="flex flex-wrap">
             @foreach ($filtro as $filtros)
            <form action="{{ route('funil3') }}" method="post">
                @csrf
  <div class="w-basis-3 md:w-basis-3 xl:w-basis-3 p-1">
    <div class="bg-white border rounded shadow p-1 ">
        <div class="flex flex-row items-center">
            <input type="hidden" name="etiqueta" value="{{$filtros->etiqueta}}">
            <div class="flex-1 text-right md:text-center">
                <button class="submit">
                <h6 class="font-bold text-sm uppercase text-gray-500">{{$filtros->etiqueta}}</h6>
                </button>
            </div>
        </div>
    </div>
  </div>
            </form>
            @endforeach

         </div>
   </x-slot>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <!--Replace with your tailwind.css once created-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
                   <!----------inicio------>
                   <div class="container w-full mx-auto pt-2">
                    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
                           <div class="flex flex-wrap">
                               <!--/Metric Card-->
                                @if(isset($etiqueta)) @foreach($etiqueta as $cli )
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Metric Card-->
                                <div class="bg-white border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <h6 class="font-bold uppercase text-sm text-indigo-500">{{$cli->etiqueta}}</h6>
                                            <div class="rounded p-3 text-sm font-bold uppercase text-gray-500">Parado<p>   @switch($h = \Carbon\Carbon::parse ($cli->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                                @case(0)
                                                Hoje
                                                    @break

                                                @case(1)
                                                Ontem
                                                    @break

                                                @default
                                              {{$h}} Dias
                                             @endswitch</div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-500"></h5>
                                            <h6 class="font-bold uppercase text-gray-500">{{$cli->nome_cliente}}</h6>
                                            <h5 class="font-bold text-sm uppercase text-gray-500">{{$cli->cidade_cliente}}</h5>
                                            <h5 class="font-bold text-sm uppercase text-gray-500">{{$cli->renda_cliente}}</h5>
                                            <h5 class="font-bold text-sm uppercase text-gray-500">{{$cli->empreendimento_cliente}}</h5>
                                            <hr>
                                            <a href="#" class="inline-block text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$cli->id}}">
                                                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <div id="tooltip-default{{$cli->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                  {{$cli->conversa_cliente}}
                                                  <div class="tooltip-arrow" data-popper-arrow></div>
                                              </div>
                                          </a>
                                             <a href="#" class="inline-block text-center" data-modal-toggle="authentication-modal">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                    </svg>
                                              </a>
                                              <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($cli->id) ],'edit')}}" class="inline-block text-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                                      fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                  </svg>
                                              </a>
                                              @if($cli->email_cliente != '')
                                              <a href="{{route('send-mail', ['id' =>$enc->encriptar($cli->id) ],'index')}}" class="inline-block text-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-800" viewBox="0 0 20 20" fill="currentColor">
                                                      <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                      <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                              </a>
                                              @else
                                              <a href="#" class="inline-block text-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                                      <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                      <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>
                                              </a>
                                              @endif

                                              @if($cli->controle_cliente != '0')
                                              <a href="#" class="inline-block text-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                                      <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                                    </svg>
                                              </a>
                                  @else
                                  <a href="{{route('funilmaisum',['id' =>$enc->encriptar($cli->id) ],'funilmaisum')}}" class="inline-block text-center">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                        </svg>
                                  </a>
                                  @endif
                                  @if ($cli->celular_cliente != '')
                                  <a href="https://wa.me/55<?php   $var1 = $cli->celular_cliente;
                                  $var1 = str_replace ("-" , "", $var1 );
                                  $var1 = str_replace ("(" , "", $var1 );
                                  $var1 = str_replace (")" , "", $var1 );
                                  $var1 = str_replace ("." , "", $var1 );
                                  $var1 = str_replace (" " , "", $var1 );
                                  echo    $var1; ?>?text={{ session ('corretor')}}"  target="_blank" class="inline-block text-center" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 text-green-400"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                  </a>
                                   @else
                                   <a href="#" class="inline-block text-center">
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 text-gray-300"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                   </a>
                                  @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/Metric Card-->
                            </div>
                            @endforeach @else  @endif

                            </div>
                            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Agendar</h3>

                                    @if(isset($clientes)) @foreach($clientes as $cli )
                                    <form class="space-y-6" method="POST" action="{{ route('add_visita_agenda',['id' =>$enc->encriptar($cli->id) ],'visita') ?? ''}}">
                                        @endforeach @else  @endif
                                        @csrf
                                        <div>
                                        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"></label>
                                       <select id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       <option value="">Escolher </option>
                                          <option style="color:#008000" value="#008000">Visita</option>
                                          <option style="color:#FFD700" value="#FFD700">Ligação</option>

                                         </select>
                                        </div>
                                        <br>
                                <div>
                                <label for="descrition" class="block mb-2 text-sm font-medium text-gray-300 ">Detalhes</label>
                                <input type="text" name="descrition" id="descrition" class="bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 ">

                               </div>
                                <div>
                                 <br>
                                <label class="text-gray-700" for="date">
                                    <input type="date"  name="inicio" class="appearance-none border border-gray-300 w-90 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent flex-1"/>
                                data
                                </label>
                                </div>
                        <br>
                                <div>

                                        <label class="text-gray-700" for="time">
                                        <input type="time"  name="hora" class="appearance-none border border-gray-300 w-90 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent flex-1"/>
                                    Hora
                                    </label>
                                   </div>
                                <div class="flex justify-between">
                                <div class="flex items-start">
                                <div class="flex items-center h-5">
                                </div>
                                </div>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                </div>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>

</x-app-layout>

