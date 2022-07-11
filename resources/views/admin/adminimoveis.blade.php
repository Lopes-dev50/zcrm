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
   </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
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
                            <img class="rounded-t-lg " src="{{ asset("storage/$imoveis->fotocapa") }}" width="330" height="200" alt="">
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
                                        <p class="mb-2 text-1xl text-center font-bold tracking-tight text-gray-900 dark:text-white">{{$imoveis->cidade}}-{{$imoveis->estado}}</p>
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
                        <div class="basis-1/2">
                            <h5 class="m-2 text-1xl font-bold text-lest  tracking-tight text-gray-900 dark:text-white">Cod: <span class="text-gray-400">{{$imoveis->cod}}</span></h5>
                        </div>
                        </div>
                        <hr>
                        <br>
                            <div class="flex pl-2 ">
                                <div class="mr-2"></div>
                                <div class="flex items-center mr-2 pr-4 pl-4">
                                    <a href="{{route('adminapagaimovel',['id' =>$enc->encriptar($imoveis->id )],'adminapagaimovel')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>
                                    </a>
                                </div>
                                @if ($imoveis->ativo !=1)
                                <div class="flex items-center mr-2 pr-4">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20 " fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                      </svg>
                                </div>
                                @else
                                <div class="flex items-center mr-2 pr-4">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                      </svg>

                                </div>
                                @endif
                                @if ($imoveis->destaque !=1)
                                <div class="flex items-center mr-2 pr-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                          </svg>
                                </div>
                                @else
                                <div class="flex items-center mr-2 pr-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                          </svg>

                                </div>
                                @endif
                                <div class="flex items-center  mr-2 pr-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                          </svg>
                                </div>
                                <div class="flex items-center  mr-2 pr-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                          </svg>
                                </div>
                               </div>
                              </div>
                              <hr>

                              <div class="basis-1/2 pt-2 pl-6 ">
                                <h5 class="mb-2 text-2xl font-bold text-center  tracking-tight text-gray-900 dark:text-white">{{ $imoveis->corretor}}</h5>
                            </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                      </div>
                      <div>
                        {{$imovel->links()}}
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
