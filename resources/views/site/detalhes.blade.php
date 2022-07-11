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
<br>
<div id="controls-carousel" class="relative pb-4" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="overflow-hidden relative h-96 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
         <!-- Item 1 -->
         @foreach ($galeria as $gal )
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset("storage/$gal->foto") }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
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
</div>
  <!----------------------------->
  @foreach ($detalhes as $det )
  <div class="grid xl:grid-cols-3 xl:gap-6 border-2 border-{{$sit->cor}}-500 rounded-lg">
    <div class="relative z-0 w-full mb-6 group">
        <p class="mb-2 pl-2 text-3xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">{{$det->nomeimovel}} -  <span class="text-gray-400 text-2xl text-left font-bold">Cod: {{$det->cod}}</span></p>
        <p class="mb-2 pl-2 text-3xl text-left font-bold tracking-tight text-{{$sit->cor}}-500 ">R$ {{$det->valor}} </p>
   </div>
    <div class="relative z-0 w-full mb-6 group">
        <p class="mb-1 pl-2 text-sm text-left font-bold tracking-tight text-gray-900 ">Endereço: <span class="text-gray-500">  {{$det->endereco}}, {{$det->numero}}</span></p>
        <p class="mb-1 pl-2 text-sm text-left font-bold tracking-tight text-gray-700 "><span class="text-gray-500"> {{$det->bairro}}  </span></p>
        <p class="mb-1 pl-2 text-sm text-left font-bold tracking-tight text-gray-700 "><span class="text-gray-500"> {{$det->cidade}} </span></p>
        <p class="mb-1 pl-2 text-sm text-left font-bold tracking-tight text-gray-700 "><span class="text-gray-500"> {{$det->CEP}}</span></p>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <p class="mb-1 pl-2 text-1xl text-left font-bold tracking-tight text-gray-700 ">Condomínio: <span class="text-{{$sit->cor}}-500">R$ {{$det->valorcondominio}} </span>  <span class="text-gray-700 pl-4">  IPTU:</span><span class="text-{{$sit->cor}}-500"> R$ {{$det->iptu}}</span></p>
            <div class="flex pl-2 ">
                <div class="mr-1"></div>
                <br>
                <br>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600 ">{{$det->quartos}}-<span class="text-gray-400"> Quartos</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$det->banheiros}}-<span class="text-gray-400"> Banheiros</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$det->metragem}}-<span class="text-gray-400"> Metros</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$det->suite}}-<span class="text-gray-400"> Suite</span></div>
                <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">{{$det->vaga}}-<span class="text-gray-400">Vaga</span></div>
           </div>
       </div>
    </div>
  @endforeach
<!----------------------------->
<br>
<div class="relative z-0 w-full mb-6 group">
   <div class="flex pl-2 ">
        <div class="mr-1"></div>
        <br>
        <br>
        <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600 ">
            <button class="block text-white bg-{{$sit->cor}}-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center " type="button" data-modal-toggle="authentication-modal">
                Agendar Visita
              </button>
        </div>
        <div class="flex items-center mr-1 pr-1 text-sm font-bold text-center text-{{$sit->cor}}-600">
            @php
            $lugar = $det->endereco.','.$det->numero.','.$det->bairro.','.$det->cidade;
            $maps = "https://www.google.com.br/maps/place/".$lugar;
           @endphp
           <a href="{{$maps}}"  target="_blank" rel=".'noopener noreferrer'.">
             <button class="block text-white bg-{{$sit->cor}}-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center " type="button">
               GOOGLE-MAPS
               </button>
           </a>
        </div>
   </div>
</div>
  <div class="basis-1/2 border-2 border-{{$sit->cor}}-500 rounded-lg">
    <div class="flex pl-2 ">
        <div class="mr-1">Próximo:</div>
        <p class="mb-4 mr-4 pl-2 text-1xl text-left font-bold tracking-tight text-gray-400 ">{{$det->perto}}</p>
    </div>
    <hr>
    <div class="flex pl-2 ">
        <div class="mr-1">Items:</div>
        <p class="mb-4 mr-4 pl-2 text-1xl text-left font-bold tracking-tight text-gray-400 ">
            @php $arr = implode ( " - " , $det->items ); print_r($arr); @endphp
             </p>
    </div>
    <hr>
    <br>
    <div class="flex pl-2 ">
        <div class="mr-1"></div>
        <p class="mb-4 mr-4 pl-2 text-1xl text-left font-bold tracking-tight text-gray-400 ">{{$det->texto}} </p>
    </div>
</div>
<br>
<!-----------------video------------------------->
@if ($det->video != 'Não Informado')
   <div class="aspect-w-16 aspect-h-9">
    <iframe src="https://www.youtube.com/embed/{{$det->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

@endif
<br>
<br>
<!----------------------simulacao----------------->
<p class="text-2xl font-bold text-center text-{{$sit->cor}}-600"> Solicite uma simulação para este imóvel.</p>
<br>
<form action=" {{ route('simula')}}" method="post">
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
        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Tem FGTS? Qual valor aproximado de FGTS?</label>
        <input type="text" id="fgts_cliente" size="12" onKeyUp="mascaraMoeda(this, event)"  name="fgts_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="nascimento_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Data de nascimento</label>
            <input type="date" id="nascimento_cliente" name="nascimento_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <div class="relative z-0 w-full mb-6 group">
                <label for="ctps" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Trabalha registrado à mais de 4 meses no emprego atual?</label>
                <select id="ctps" name="ctps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="SIM">SIM</option>
                    <option value="NÃO">NÃO</option>
                </select>
            </div>
            </div>
        <div class="relative z-0 w-full mb-6 group">
                    <label for="escivil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual o seu estado Civil?</label>
                    <select id="escivil" name="escivil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Selecionar">Selecionar</option>
                        <option value="CASADO">CASADO(A)</option>
                        <option value="SOLTERIO">SOLTEIRO(A)</option>
                        <option value="UNIÃO ESTAVEL">UNIÃO ESTAVEL</option>
                        <option value="DIVORCIADO">DIVORCIADO(A)</option>
                    </select>
                </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="dependente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Você tem filhos ou dependentes?</label>
                <select id="dependente" name="dependente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="SIM">SIM</option>
                    <option value="NÃO">NÃO</option>
                </select>
            </div>
        </div>
            <div class="grid xl:grid-cols-3 xl:gap-6">
                </div>
                <div class="grid xl:grid-cols-3 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="imovel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Você tem imóvel no seu nome?</label>
                        <select id="imovel" name="imovel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Selecionar">Selecionar</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="juntar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Pretende comprar sozinho ou vai juntar renda?</label>
                        <select id="juntar" name="juntar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Selecionar">Selecionar</option>
                            <option value="SOZINHO">SOZINHO(A)</option>
                            <option value="JUNTAR RENDA">cônjuge, parente, amigos etc.</option>
                        </select>
                    </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="entrada" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Possui entrada?</label>
                            <select id="entrada" name="entrada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="NÃO">NÃO</option>
                                <option value="SIM">SIM</option>
                            </select>
                        </div>
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
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual suas dúvidas</label>
<textarea id="message" name="conversa_cliente" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
   <br>
   <input type="hidden" name="empreendimento_cliente" value="{{$det->empreendimento_cliente}} ">
   <input type="hidden" name="cidade_cliente" value="{{$det->cidade}} ">
   <input type="hidden" name="bairro_interesse_cliente" value="{{$det->bairro}} ">
   <input type="hidden" name="cod" value="{{$det->cod}}">
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
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Agendar visita, imovel COD: {{$det->cod}}</h3>
                <form action=" {{ route('visita')}}" method="post">
                    @csrf
                    <div>
                        <input type="text" name="nome_cliente" id="nome" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nome" required>
                    </div>
                    <div>
                        <input type="text" name="celular_cliente" id="telefone" maxlength="15" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Celular" required>
                    </div>
                    <div>
                        <input type="email" name="email_cliente" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="dia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dia</label>
                        <input type="date" name="dia" id="dia"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="hora" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Horário</label>
                        <input type="time" name="hora" id="hora" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                        </div>
                    </div>
                    <input type="hidden" name="empreendimento_cliente" value="{{$det->empreendimento_cliente}} ">
                    <input type="hidden" name="cidade_cliente" value="{{$det->cidade}} ">
                    <input type="hidden" name="bairro_interesse_cliente" value="{{$det->bairro}} ">
                    <input type="hidden" name="cod" value="{{$det->cod}}">
                    @foreach ($corretor as $corre )
                    <input type="hidden" name="user_id" value="{{ $corre->id}}">
                    <input type="hidden" name="equipe_id" value="{{ $corre->equipe_id}}">
                    <input type="hidden" name="corretor" value="{{ $corre->name}}">
                 @endforeach
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ENVIAR</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--------fim------->
<script src="{{ asset('js/meus.js') }}" defer></script>
            </div>
        </div>
    </div>
</div>
@include('/site/layouts/footer')
</body>
</html>


