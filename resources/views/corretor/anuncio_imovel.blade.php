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
                                                <p class="mb-2 text-1xl text-center font-bold tracking-tight text-gray-900 dark:text-white">{{$imoveis->cidade}}</p>
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
                                        <div class="flex items-center mr-4 pr-4 pl-4">
                                        </div>

                                          <div class="flex items-center mr-4 pr-4">
                                            <a href="{{route('paga_anuncio',['id' =>$enc->encriptar($imoveis->id )],'paga_anuncio')}}">
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ATIVAR ANUNCIO</button>
                                              </a>
                                        </div>
                                        <div class="flex items-center  mr-4 pr-4">
                                        </div>
                                        <div class="flex items-center  mr-4 pr-4">
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
                    <h1 class="mr-4 pt-4 text-2xl font-bold text-left  tracking-tight text-gray-900 ">Titulo</h1>
                      <p class="mb-2 pt-4text-1xl font-bold text-left  tracking-tight text-gray-600 ">Seu imovel fica em destaque na primeira pagina do site zimbimovel</p>
                      <p class="mb-2 text-1xl font-bold text-left  tracking-tight text-gray-600 ">Perildo de 30 dias por valor de R$ 100,00 </p>

                    </div>

                  </div>
                        {{$imovel->links()}}

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
