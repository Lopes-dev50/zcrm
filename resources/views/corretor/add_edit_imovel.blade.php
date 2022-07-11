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
                   <div class="py-10 ">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6  border-b bg-white">
                                   <!----------inicio------>
                                   @if(isset($imovel))
                                   <form action="{{ route('update_imovel',['id' =>$enc->encriptar($imovel->id ) ] ,'update') }}" method="post" enctype="multipart/form-data">

                                     @method('PUT')
                                       @else
                                       <form action=" {{ route('add_imovel')}}" method="post" enctype="multipart/form-data">
                                           @endif
                                           <form action=" " method="post" enctype="multipart/form-data">
                                               @csrf
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Nome imovel</label>
                        <input type="text" id="text" name="nomeimovel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('nomeimovel')}}{{$imovel->nomeimovel ?? ''}}">
                        </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Cidade</label>
                        <input type="text" id="text" name="cidade"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('cidade')}}{{$imovel->cidade ?? ''}}">
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Valor</label>
                            <input type="text" id="text" name="valor"  size="12" onKeyUp="mascaraMoeda(this, event)" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('valor')}}{{$imovel->valor ?? ''}}">
                            </div>
                    </div>
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Estado</label>
                            <select id="countries" name="estado" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{$imovel->estado ?? 'Selecionar'}}</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mata Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Tipo Imovel</label>
                            <select id="countries" name="tipo" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{$imovel->tipo ?? 'Selecionar'}}</option>
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
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Tipo Imovel</label>
                            <select id="countries" name="plantapronto" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{$imovel->plantapronto ?? 'Selecionar'}}</option>
                                <option value="PRONTO">PRONTO</option>
                                <option value="PLANTA">PLANTA</option>
                                <option value="CONSTRUÇÃO">CONSTRUÇÃO</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Para</label>
                            <select id="countries" name="locarvender" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{$imovel->locarvender ?? 'Selecionar'}}</option>
                                <option value="ALUGAR">ALUGAR</option>
                                <option value="VENDER">VENDER</option>
                            </select>
                        </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Cep</label>
                                <input type="number" id="text" name="CEP"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('CEP')}}{{$imovel->CEP ?? ''}}">
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Endereço</label>
                                    <input type="text" id="text" name="endereco" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('endereco')}}{{$imovel->endereco ?? ''}}">
                                    </div>
                            </div>
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Número</label>
                        <input type="number" id="renda_cliente" name="numero" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('numero')}}{{$imovel->numero ?? ''}}">
                        </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('bairro')}}{{$imovel->bairro ?? ''}}">
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="iptu" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">IPTU</label>
                            <input type="text" id="iptu" name="iptu"  size="12" onKeyUp="mascaraMoeda(this, event)" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('iptu')}}{{$imovel->iptu ?? ''}}">
                            </div>
                    </div>
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="valorcondominio" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Valor Condominio</label>
                            <input type="text" id="valorcondominio"  size="12" onKeyUp="mascaraMoeda(this, event)" name="valorcondominio" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('valorcondominio')}}{{$imovel->valorcondominio ?? ''}}">
                            </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="metragem" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Metragem</label>
                            <input type="number" id="metragem" name="metragem" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('metragem')}}{{$imovel->metragem  ?? ''}}">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="quartos" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Quartos</label>
                                <input type="number" id="quartos" name="quartos" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('quartos')}}{{$imovel->quartos ?? ''}}">
                                </div>
                        </div>
                        <div class="grid xl:grid-cols-3 xl:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="banheiros" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Banheiros</label>
                                <input type="number" id="banheiros" name="banheiros" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('banheiros')}}{{$imovel->banheiros  ?? ''}}">
                                </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="vaga" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Número de Vaga</label>
                                <input type="number" id="vaga" name="vaga" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('vaga')}}{{$imovel->vaga ?? ''}}">
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="suite" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Suites</label>
                                    <input type="number" id="suite" name="suite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('suite')}}{{$imovel->suite ?? ''}}">
                                    </div>
                            </div>
                          <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="video" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Video</label>
                                    <input type="text" id="video" name="video" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('video')}}{{$imovel->video ?? ''}}">
                                    </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="dono" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Dono do imóvel</label>
                                    <input type="text" id="dono" name="dono" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('dono')}}{{$imovel->dono ?? ''}}">
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <label for="imcorporadora" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Construtora</label>
                                        <input type="text" id="imcorporadora" name="imcorporadora" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{old('imcorporadora')}}{{$imovel->imcorporadora ?? ''}}">
                                        </div>
                                </div>
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Fica perto de</label>
                <textarea id="message" name="perto" rows="4" class="block p-2.5 w-full text-sm text-gray-400 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('perto')}}{{$imovel->perto ?? ''}}</textarea>
                   <br>
                   <label for="message" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Detalhes</label>
                   <textarea id="message" name="texto" rows="4" class="block p-2.5 w-full text-sm text-gray-400 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('texto')}}{{$imovel->texto ?? ''}}</textarea>
                      <br>
                      <!----------selet------>
                      @if(isset($imovel))
                      <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Playground" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Playground", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Playground</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quiosque" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Quiosque", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Quiosque</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quadra poliesportiva" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Quadra poliesportiva", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Quadra poliesportiva</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Churrasqueira na sacada" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Churrasqueira na sacada", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Churrasqueira na sacada</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Sauna" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Sauna", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Sauna</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Elevador" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Elevador", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Elevador</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Salão de festa" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Salão de festa", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Salão de festa</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Lareira" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Lareira", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Lareira</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quadra tenis" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Quadra tenis", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Quadra ténis</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Sala de jogos" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Sala de jogos", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Sala de jogos</label>
                            </div>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Condominio Fechado" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Condominio Fechado", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Condominio fechado</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Interfone" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Interfone", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Interfone</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Gazebo" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Gazebo", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Gazebo</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Lago" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Lago", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Lago</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Portaria 24hs" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Portaria 24hs", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Portaria 24hs</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Ar condicionado" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Ar condicionado", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Ar condicionado</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Estacionamento" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Estacionamento", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Estacionamento</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Jardim" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Jardim", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Jardim</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Academia" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Academia", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Academia</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Cinema" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                @if (in_array("Cinema", $imovel->items )) checked > @else > @endif
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Cinema</label>
                            </div>

                        </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Brinquedoteca" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Brinquedoteca", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Brinquedoteca</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Quisques com churrasqueira" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Quisques com churrasqueira", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Quisques com churrasqueira</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Sacada" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Sacada", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Sacada</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Churrasqueira na cozinha" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Churrasqueira na cozinha", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Churrasqueira na Cozinha</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Piscina" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Piscina", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Piscina</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Piscina Infantil" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Piscina Infantil", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Piscina Infantil</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Gerador elétrico" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Gerador elétrico", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Gerador elétrico</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Espaço gourmet" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Espaço gourmet", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Espaço gourmet</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Bicicletário" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Bicicletário", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Bicicletário</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Pet Place" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("Pet Place", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-500">Pet Place</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="SEM INFRA" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500"
                                    @if (in_array("SEM INFRA", $imovel->items )) checked > @else > @endif
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-red-600 ">NÃO TENHA INFRA MARCAR ESTA OPÇÃO</label>
                                </div>
                            </div>
                        </div>
                      <!----------selet------>
                      @else
                      <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Playground" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Playground</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quiosque" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Quiosque</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quadra poliesportiva" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Quadra poliesportiva</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Churrasqueira na sacada" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Churrasqueira na sacada</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Sauna" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Sauna</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Elevador" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Elevador</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Salão de festa" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Salão de festa</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Lareira" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Lareira</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Quadra tenis" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Quadra ténis</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Sala de jogos" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Sala de jogos</label>
                            </div>

                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Condominio Fechado" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Condominio fechado</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Interfone" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Interfone</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Gazebo" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Gazebo</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Lago" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Lago</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Portaria 24hs" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Portaria 24hs</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Ar condicionado" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Ar condicionado</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Estacionamento" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Estacionamento</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Jardim" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Jardim</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Academia" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Academia</label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" type="checkbox" value="Cinema" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Cinema</label>
                            </div>

                        </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Brinquedoteca" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Brinquedoteca</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Quisques com churrasqueira" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Quisques com churrasqueira</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Sacada" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Sacada</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Churrasqueira na cozinha" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Churrasqueira na Cozinha</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Piscina" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Piscina</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Piscina Infantil" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Piscina Infantil</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Gerador elétrico" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Gerador elétrico</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Espaço gourmet" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Espaço gourmet</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Bicicletário" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Bicicletário</label>
                                </div>

                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="Pet Place" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-500 ">Pet Place</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="SEM INFRA" name="items[]" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-200 focus:ring-2 dark:bg-gray-200 dark:border-gray-500">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-red-600 ">NÃO TENHA INFRA MARCAR ESTA OPÇÃO</label>
                                </div>
                            </div>
                        </div>

                        @endif
                      <!--------------------->
                      <hr>
                      <div class="grid xl:grid-cols-2 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Foto Principal</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" name="image" type="file">
                        <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">(jpeg,png,jpg,svg|max:1Mega)</div>
                       </div>

                       </div>
                        <hr>
                      <br>
                      <br>
                      @if(isset($imovel))
                      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ATUALIZAR</button>
                      @else
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CADASTRAR  </button>
                       @endif
                     <br>
                     <script src="{{ asset('js/meus.js') }}" defer></script>
                                   <!-----------fim-------->
                                </div>
                            </div>
                        </div>
                    </div>
                </x-app-layout>




