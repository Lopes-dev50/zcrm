 @include('/site/layouts/top')
            <!--inicio -->
            @php
            $enc = new App\Classes\Enc;
            @endphp
            <div id="controls-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-48  sm:h-64 xl:h-80 2xl:h-96">
                     <!-- Item 1 -->
                     @foreach ($destaque as $des )
                     <a href="{{ route('detalhes',['id' =>$enc->encriptar($des->id ) ] ,'detalhes') }}">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset("storage/$des->fotocapa") }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                     </a>
                     @endforeach
                    <!-- Item 2 -->
                </div>
                <!-- Slider controls -->
                <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="hidden">Voltar</span>
                    </span>
                </button>
                <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="hidden">Proximo</span>
                    </span>
                </button>
            </div>
            <div class="bg-white">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
     @foreach ($site as $sit )
     @endforeach
     <div class="bg-{{$sit->cor}}-500 border-2 w-full rounded-lg">
        <form action="{{ route('busca',['id' =>$enc->encriptar($sit->id ) ] ,'busca') }}" method="post">
            @csrf
    <div class="grid xl:grid-cols-3 xl:gap-6">
        <div class="relative z-0 w-full mb-6 pt-4 pl-4 pr-4 group">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"></label>
            <select id="countries" name="plantapronto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($busca1 as $busca){?>
                    <option value="{{ $busca->plantapronto}}">{{ $busca->plantapronto }}</option>
                  @endforeach
            </select>
        </div>
        <div class="relative z-0 w-full mb-6 pt-4 pl-4 pr-4 group">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"></label>
            <select id="countries" name="cidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($busca2 as $busca){?>
                    <option value="{{ $busca->cidade }}">{{ $busca->cidade }}</option>
                  @endforeach
            </select>
        </div>
            <div class="relative z-0 w-full mb-6 pt-4 pl-4 pr-4 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"></label>
                <button type="submit" class="w-full  text-{{$sit->cor}}-600 bg-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">BUSCAR</button>
            </div>
        </div>
        </form>
</div>
<div>
<!---------------cards-------------------->
<div class="flex flex-wrap">
    @foreach ($imovel as $imoveis )
    <div class="flex mt-2 pr-4 ">
     <div class=" basis-1/4 p-3">
        <a href="{{ route('detalhes',['id' =>$enc->encriptar($imoveis->id ) ] ,'detalhes') }}">
        <div class=" bg-white rounded-lg border border-gray-200 shadow-md">

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
                <div class="ribbon bg-red-500 text-center text-sm whitespace-no-wrap px-4">  {{$imoveis->plantapronto}}</div>
                @break
            @default
        @endswitch
        </button>

            <div class="p-3 mb-4">
                <div class="flex flex-row">
                    <div class="mr-2"></div>
                    <div class="basis-1">
                        <p class="mb-2 text-2xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$imoveis->cidade}} </p>
                        <p class="mb-2 text-1xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$imoveis->bairro}}</p>
                    </div>
                </div>
                <br>
            @switch($imoveis->locarvender)
            @case('ALUGAR')
            <div class="flex flex-row">
                <div class="mr-1"></div>
                <div class="basis-1/2">
                    <h5 class="mb-1 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-700 ">ALUGUEL</h5>
            </div>
            <div class="mr-2"></div>
            <div class="basis-1/2">
                <h4 class="mb-2 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-900 ">R$ <span class="text-gray-400">{{$imoveis->valor }}</span></h4>
            </div>
            </div>
                 @break
            @case('VENDER')
            <div class="flex flex-row">
                <div class="mr-1"></div>
                <div class="basis-1/2">
                    <h5 class="mb-1 text-1xl font-bold text-left tracking-tight text-{{$sit->cor}}-700 ">VALOR</h5>
            </div>
            <div class="mr-1"></div>
            <div class="basis-1/2">
                <h5 class="mb-2 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-900 "><span class="text-{{$sit->cor}}-500">R$ {{$imoveis->valor}}</span></h5>
            </div>
            </div>
            @break
            @default
        @endswitch
        <br>
        <div class="flex flex-row">
        <div class="mr-2"></div>
        </div>
        <hr>
        <br>
            <div class="flex pl-2 ">
                <div class="mr-1"></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600 ">{{$imoveis->quartos}}-<span class="text-gray-400"> Dormitorios</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$imoveis->banheiros}}-<span class="text-gray-400"> Banheiros</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$imoveis->metragem}}-<span class="text-gray-400"> Metros</span></div>
           </div>
             </div>
            </div>
        </div>
    </a>

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
<!-------------sobre-------------->
@if($sit->sobre != '')
<div id="#sobre" class="bg-{{$sit->cor}}-500 rounded-lg  overflow-hidden relative ">
    <div class="text-start w-1/2 py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
            <span class="block">
               {{$sit->sobre}}
            </span>
        </h2>
            <span class="block text-gray-800 text-1xl">
               {{$sit->sobretexto}}
            </span>

        <div class="lg:mt-0 lg:flex-shrink-0">
            <div class="mt-12 inline-flex rounded-md shadow">

            </div>
        </div>
    </div>
    <img src="{{ asset("imgSite/textos.jpg") }}" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0"/>
</div>
@endif
<!---------------------------------------->
</div>
<!---------alugar--------------->
@if(isset($imovelalugar))
<!---------------cards-------------------->
<div class="flex flex-wrap">
    @foreach ($imovelalugar as $imoveis )
    <div class="flex mt-2 pr-4 ">
     <div class=" basis-1/4 p-3">
        <a href="{{ route('detalhes',['id' =>$enc->encriptar($imoveis->id ) ] ,'detalhes') }}">
        <div class=" bg-white rounded-lg border border-gray-200 shadow-md">

            <button class='relative  font-bold overflow-hidden'>
            <img class="rounded-t-lg " src="{{ asset("storage/$imoveis->fotocapa") }}" width="330" height="200" alt="">
            <div class="ribbon bg-yellow-500 text-center  text-sm whitespace-no-wrap px-4">  Locação</div>
        </button>

            <div class="p-3 mb-4">
                <div class="flex flex-row">
                    <div class="mr-2"></div>
                    <div class="basis-1">
                        <p class="mb-2 text-2xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$imoveis->cidade}} </p>
                        <p class="mb-2 text-1xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$imoveis->bairro}}</p>
                    </div>
                </div>
                <br>
            @switch($imoveis->locarvender)
            @case('ALUGAR')
            <div class="flex flex-row">
                <div class="mr-1"></div>
                <div class="basis-1/2">
                    <h5 class="mb-1 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-700 ">ALUGUEL</h5>
            </div>
            <div class="mr-2"></div>
            <div class="basis-1/2">
                <h4 class="mb-2 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-900 ">R$ <span class="text-gray-400">{{$imoveis->valor }}</span></h4>
            </div>
            </div>
                 @break
            @case('VENDER')
            <div class="flex flex-row">
                <div class="mr-1"></div>
                <div class="basis-1/2">
                    <h5 class="mb-1 text-1xl font-bold text-left tracking-tight text-{{$sit->cor}}-700 ">VALOR</h5>
            </div>
            <div class="mr-1"></div>
            <div class="basis-1/2">
                <h5 class="mb-2 text-1xl font-bold text-left  tracking-tight text-{{$sit->cor}}-900 "><span class="text-{{$sit->cor}}-500">R$ {{$imoveis->valor}}</span></h5>
            </div>
            </div>
            @break
            @default
        @endswitch
        <br>
        <div class="flex flex-row">
        <div class="mr-2"></div>
        </div>
        <hr>
        <br>
            <div class="flex pl-2 ">
                <div class="mr-1"></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600 ">{{$imoveis->quartos}}-<span class="text-gray-400"> Dormitorios</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$imoveis->banheiros}}-<span class="text-gray-400"> Banheiros</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$imoveis->metragem}}-<span class="text-gray-400"> Metros</span></div>
           </div>
             </div>
            </div>
        </div>
    </a>
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

@else
<br>

    @endif
<!--------fim------->
                        </div>
                    </div>
                </div>
        </div>
        @include('/site/layouts/footer')
    </body>
</html>
