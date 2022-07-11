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
   </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                <div class="container flex flex-norow">
                    <!-- ... -->
                    <div class="flex mt-2 pr-4 ">
                      <div class="bg-gray-50 border-2 rounded-md mb-3 ">
                        <div class="font-normal text-center text-gray-300 text-2xl uppercase underline decoration-indigo-500" >{{count($pepino1)}} Inicio </div>
                        @foreach ($pepino1 as $pepi )
                        <div class="p-3 w-185 h-200">
                            <div class="bg-indigo-800 p-3 rounded-md shadow-md w-190 h-220">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->nome_cliente}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->celular_cliente}}</p>
                            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Atualizado:
                               <!--------->
                                @switch($h = \Carbon\Carbon::parse ($pepi->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                @case(0)
                                Hoje
                                    @break

                                @case(1)
                                Ontem
                                    @break

                                @default
                              {{$h}} Dias
                             @endswitch</p>
                            <br>
                            <div class="flex ">
                                <div class="flex items-center mr-4 pr-4">
                                    <a href="{{route('zera',['id' =>$enc->encriptar($pepi->id) ],'zera')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>
                                    </a>
                                </div>
                                <div class="flex items-center mr-4 pr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$pepi->id}}">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                      </svg>
                                      <div id="tooltip-default{{$pepi->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        {{$pepi->conversa_cliente}}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="flex items-center mr-4 pr-4">
                                    <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($pepi->id) ],'edit')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                          </svg>
                                        </a>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{route('maisum',['id' =>$enc->encriptar($pepi->id) ],'maisum')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                          </svg>
                                     </a>
                                </div>
                            </div>
                         </div>
                            <div class="flex flex-row"><div class="basis-1/2 pr-4 pb-4"></div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                   </div>
                   <!--------->
                   <div class="flex mt-2 pr-4 ">
                    <div class="bg-gray-50 border-2 rounded-md mb-3 ">
                        <div class="font-normal text-center text-2xl text-gray-300 uppercase underline decoration-indigo-500" >{{count($pepino2)}} Contato 1</div>
                      @foreach ($pepino2 as $pepi )
                      <div class="p-3 w-185 h-200">
                          <div class="bg-green-800 p-3 rounded-md shadow-md w-190 h-220">
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->nome_cliente}}</p>
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->celular_cliente}}</p>
                          <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Atualizado:
                             <!--------->
                              @switch($h = \Carbon\Carbon::parse ($pepi->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                              @case(0)
                              Hoje
                                  @break

                              @case(1)
                              Ontem
                                  @break

                              @default
                            {{$h}} Dias
                           @endswitch</p>
                          <br>
                          <div class="flex ">
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('zera',['id' =>$enc->encriptar($pepi->id) ],'zera')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                      </svg>
                                </a>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$pepi->id}}">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                  </svg>
                                  <div id="tooltip-default{{$pepi->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    {{$pepi->conversa_cliente}}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($pepi->id) ],'edit')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                      </svg>
                                    </a>
                            </div>
                            <div class="flex items-center">
                                <a href="{{route('maisum',['id' =>$enc->encriptar($pepi->id) ],'maisum')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                      </svg>
                                 </a>
                            </div>
                        </div>
                     </div>
                        <div class="flex flex-row"><div class="basis-1/2 pr-4 pb-4"></div>
                       </div>
                    </div>
                      @endforeach
                   </div>
                 </div>
                <!------------->
                <div class="flex mt-2 pr-4">
                    <div class="bg-gray-50 border-2 rounded-md mb-3 ">
                        <div class="font-normal text-center text-2xl text-gray-300 uppercase underline decoration-indigo-500" >{{count($pepino3)}} Contato2</div>
                      @foreach ($pepino3 as $pepi )
                      <div class="p-3 w-185 h-200">
                          <div class="bg-gray-700 p-3 rounded-md shadow-md w-190 h-220">
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->nome_cliente}}</p>
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->celular_cliente}}</p>
                          <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Atualizado:
                             <!--------->
                              @switch($h = \Carbon\Carbon::parse ($pepi->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                              @case(0)
                              Hoje
                                  @break

                              @case(1)
                              Ontem
                                  @break

                              @default
                            {{$h}} Dias
                           @endswitch</p>
                          <br>
                          <div class="flex ">
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('zera',['id' =>$enc->encriptar($pepi->id) ],'zera')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                      </svg>
                                </a>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$pepi->id}}">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                  </svg>
                                  <div id="tooltip-default{{$pepi->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    {{$pepi->conversa_cliente}}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($pepi->id) ],'edit')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                      </svg>
                                    </a>
                            </div>
                            <div class="flex items-center">
                                <a href="{{route('maisum',['id' =>$enc->encriptar($pepi->id) ],'maisum')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                      </svg>
                                 </a>
                            </div>
                        </div>
                     </div>
                        <div class="flex flex-row"><div class="basis-1/2 pr-4 pb-4"></div>
                       </div>
                    </div>
                      @endforeach
                   </div>
                 </div>
                 <!------------>
                 <div class="flex mt-2 pr-4">
                    <div class="bg-gray-50 border-2 rounded-md mb-3 ">
                        <div class="font-normal text-center text-2xl text-gray-300 uppercase underline decoration-indigo-500" >{{count($pepino4)}} Retornar</div>
                      @foreach ($pepino4 as $pepi )
                      <div class="p-3 w-185 h-200">
                          <div class="bg-yellow-600 p-3 rounded-md shadow-md w-190 h-220">
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->nome_cliente}}</p>
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->celular_cliente}}</p>
                          <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Atualizado:
                             <!--------->
                              @switch($h = \Carbon\Carbon::parse ($pepi->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                              @case(0)
                              Hoje
                                  @break

                              @case(1)
                              Ontem
                                  @break

                              @default
                            {{$h}} Dias
                           @endswitch</p>
                          <br>
                          <div class="flex ">
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('zera',['id' =>$enc->encriptar($pepi->id) ],'zera')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                      </svg>
                                </a>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$pepi->id}}">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                  </svg>
                                  <div id="tooltip-default{{$pepi->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    {{$pepi->conversa_cliente}}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($pepi->id) ],'edit')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                      </svg>
                                    </a>
                            </div>
                            <div class="flex items-center">
                                <a href="{{route('maisum',['id' =>$enc->encriptar($pepi->id) ],'maisum')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                      </svg>
                                 </a>
                            </div>
                        </div>
                     </div>
                        <div class="flex flex-row"><div class="basis-1/2 pr-4 pb-4"></div>
                       </div>
                    </div>

                      @endforeach
                   </div>
                 </div>
                 <!----------->
                 <div class="flex mt-2 pr-4">
                    <div class="bg-gray-50 border-2 rounded-md mb-3 ">
                        <div class="font-normal text-center text-2xl text-gray-300 uppercase underline decoration-indigo-500" >{{count($pepino5)}} Visita</div>
                      @foreach ($pepino5 as $pepi )
                      <div class="p-3 w-185 h-200">
                          <div class="bg-blue-800 p-3 rounded-md shadow-md w-190 h-220">
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->nome_cliente}}</p>
                          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$pepi->celular_cliente}}</p>
                          <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Atualizado:
                             <!--------->
                              @switch($h = \Carbon\Carbon::parse ($pepi->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                              @case(0)
                              Hoje
                                  @break

                              @case(1)
                              Ontem
                                  @break

                              @default
                            {{$h}} Dias
                           @endswitch</p>
                          <br>
                          <div class="flex ">
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('zera',['id' =>$enc->encriptar($pepi->id) ],'zera')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                      </svg>
                                </a>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor" data-tooltip-target="tooltip-default{{$pepi->id}}">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                  </svg>
                                  <div id="tooltip-default{{$pepi->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    {{$pepi->conversa_cliente}}
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="flex items-center mr-4 pr-4">
                                <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($pepi->id) ],'edit')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                      </svg>
                                    </a>
                            </div>
                        </div>
                     </div>
                        <div class="flex flex-row"><div class="basis-1/2 pr-4 pb-4"></div>
                       </div>
                    </div>
                      @endforeach
                   </div>
                 </div>
                   <!--------->
                </div>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
