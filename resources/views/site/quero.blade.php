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
         <a href="">
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
<!-------------detalhes-------------------->
<br>
<!----------------------simulacao----------------->
<p class="text-2xl font-bold text-center text-{{$sit->cor}}-600">Caso não tenha achado o imóvel que procura no site, deixa eu ajudar você, a encontrar. Responda formulário para que possa saber o tipo de imóvel que procura.</p>
<br>
<form action=" {{ route('add_quero')}}" method="post">
    @csrf
<div class="grid xl:grid-cols-3 xl:gap-6">

    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Nome</label>
        <input type="text" id="email" name="nome_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Email</label>
        <input type="email" id="email" name="email_cliente"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Celular</label>
            <input type="text" id="telefone" name="celular_cliente" maxlength="15" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual a renda bruta de todos compradores?</label>
        <input type="text" id="renda_cliente"  size="12" onKeyUp="mascaraMoeda(this, event)" name="renda_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual sua cidade?</label>
        <input type="text" id="cidade_cliente"    name="cidade_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="nascimento_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Data de nascimento</label>
            <input type="date" id="nascimento_cliente" name="nascimento_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <div class="relative z-0 w-full mb-6 group">
                <label for="empreendimento_cliente" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Qual tipo de imóvel que procura?</label>
                <select id="empreendimento_cliente" name="empreendimento_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="Área">Área</option>
                    <option value="Apartamento 1D">Apartamento 1D</option>
                    <option value="Apartamento 2D">Apartamento 2D</option>
                    <option value="Apartamento 3D">Apartamento 3D</option>
                    <option value="Cobertura">Cobertura</option>
                    <option value="Casa 1D">Casa 1D</option>
                    <option value="Casa 2D">Casa 2D</option>
                    <option value="Casa 3D">Casa 3D</option>
                    <option value="Casa 4D">Casa 4D</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Chácara">Chácara</option>
                    <option value="Casa + Salão Comercial">Casa + Salão Comercial</option>
                    <option value="Casa em Condomíno">Casa em Condomíno</option>
                    <option value="Fazenda">Fazenda</option>
                    <option value="Flat">Flat</option>
                    <option value="Galpão">Galpão</option>
                    <option value="Hotel">Hotel</option>
                    <option value="Indústria">Indústria</option>
                    <option value="Ilha">Ilha</option>
                    <option value="Lançamento">Lançamento</option>
                    <option value="Lote">Lote</option>
                    <option value="Loja">Loja</option>
                    <option value="Sobrado">Sobrado</option>
                    <option value="Sala Comercial">Sala Comercial</option>
                    <option value="Sítio">Sítio</option>
                    <option value="Prédio">Prédio</option>
                    <option value="Terreno">Terreno</option>
                </select>
            </div>
            </div>
        <div class="relative z-0 w-full mb-6 group">
                    <label for="escivil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Até quanto valor imóvel?</label>
                    <select id="valor" name="valor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Selecionar">Selecionar</option>
                        <option value="100.000,00">Até 100 mil</option>
                        <option value="150.000,00">Até 150 mil</option>
                        <option value="200.000,00">Até 200 mil</option>
                        <option value="300.000,00">Até 300 mil</option>
                        <option value="500.000,00">Até 400 mil</option>
                        <option value="500.000,00">Acima de 500 mil</option>
                    </select>
                </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="entrada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Tem reserva para entrada?</label>
                <select id="entrada" name="entrada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="Tenho 5 mil">Tenho 5 mil</option>
                    <option value="Tenho 10 mil">Tenho 10 mil</option>
                    <option value="Tenho 15 mil">Tenho 15 mil</option>
                    <option value="Tenho 20 mil">Tenho 20 mil</option>
                    <option value="Tenho 25 mil">Tenho 25 mil</option>
                    <option value="Mais que 30 mil">Mais que 30 mil</option>
                    <option value="NÃO TENHO NADA">NÃO TENHO NADA</option>
                </select>
            </div>
        </div>
            <div class="grid xl:grid-cols-3 xl:gap-6">
                </div>

                    <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="spc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Algum dos compradores possui restrição financeira (SPC)?</label>
                            <select id="spc" name="spc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="SIM">SIM</option>
                                <option value="NÃO">NÃO</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="financiamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Possui financiamento (veiculo, empréstimo bancário)?</label>
                            <select id="financiamento" name="financiamento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="SIM">SIM</option>
                                <option value="NÃO">NÃO</option>
                            </select>
                        </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Como encontrou o site?</label>
                                <select id="countries" name="origem_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="Indicado">Indicacão</option>
                                    <option value="Anuncio">Anuncio</option>
                                    <option value="FaceBook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Pesquisando">Pesquisando</option>
                                </select>
                            </div>
                        </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Mais detalhes do imóvel que procura.</label>
<textarea id="message" name="conversa_cliente" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
   <br>

   @foreach ($corretor as $corre )
   <input type="hidden" name="user_id" value="{{ $corre->id}}">
   <input type="hidden" name="equipe_id" value="{{ $corre->equipe_id}}">
   <input type="hidden" name="corretor" value="{{ $corre->name}}">
@endforeach
   <button type="submit" class="text-white bg-{{$sit->cor}}-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">ENVIAR</button>
  </form>
<br>
<br>
<hr>
<!---------------cards-------------------->
<div class="flex flex-wrap">
    @foreach ($osimovel as $imoveis )
    <div class="flex mt-2 pr-4 ">
     <div class=" basis-1/4 p-3">
        <div class=" bg-white rounded-lg border border-gray-200 shadow-md">
            <a href="{{ route('detalhes',['id' =>$enc->encriptar($imoveis->id ) ] ,'detalhes') }}">
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
                        <p class="mb-2 text-2xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$imoveis->cidade}}</p>
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
        {{$osimovel->links()}}
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
<br>

</div>
<!------------------->
<!--------fim------->
<script src="{{ asset('js/meus.js') }}" defer></script>
            </div>
        </div>
    </div>
</div>
@include('/site/layouts/footer')
</body>
</html>


