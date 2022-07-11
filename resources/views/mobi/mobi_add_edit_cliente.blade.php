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
        <div class="flex flex-row">
            <div class="pr-4 dark:text-gray-400" > @if(isset($cliente)) Editar  @else Cadastrar  @endif</div>
            <div class="pr-4 dark:text-gray-400">   @if(isset($cliente)) Cadastrado: {{ $cliente->created_at->format('d. M. Y')  }} | Atualizado: {{ $cliente->updated_at->format('d. M. Y')  }}  @else   @endif
            </div>
            <div class="pr-4 dark:text-gray-400"><a href="{{route('mobi_funil_corretor',['id' =>$enc->encriptar(Auth::user()->id )],'show')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                  </svg>
            </a></div>
        </div>
   </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b bg-white">
                   <!----------inicio------>
                   @if(isset($cliente))
                   <form action="{{ route('mobi_add_edit_cliente',['id' =>$enc->encriptar($cliente->id ) ] ,'update') }}" method="post">

                    @method('PUT')
                      @else
                      <form action=" {{ route('mobi_add_cliente')}}" method="post">

                          @endif
                    @csrf
    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nome</label>
        <input type="text" id="email" name="nome_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$cliente->nome_cliente ?? ''}}">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Email</label>
        <input type="email" id="email" name="email_cliente"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->email_cliente ?? ''}}">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Celular</label>
            <input type="text" id="telefone" maxlength="15" name="celular_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->celular_cliente ?? ''}}">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Renda</label>
        <input type="text" id="renda_cliente"  size="12" onKeyUp="mascaraMoeda(this, event)" name="renda_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->renda_cliente ?? ''}}">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">FGTS</label>
        <input type="text" id="fgts_cliente"  size="12" onKeyUp="mascaraMoeda(this, event)" name="fgts_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->fgts_cliente  ?? ''}}">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="cidade_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Cidade</label>
            <input type="text" id="cidade_cliente" name="cidade_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->cidade_cliente ?? ''}}">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <label for="bairro_interesse_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Bairro de Intersse</label>
            <input type="text" id="bairro_interesse_cliente" name="bairro_interesse_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->bairro_interesse_cliente ?? ''}}">
            </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="empreendimento_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Empreendimento de interesse</label>
            <input type="text" id="empreendimento_cliente" name="empreendimento_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->empreendimento_cliente ?? ''}}">
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="interesse_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Interesse</label>
                <input type="text" id="interesse_cliente" name="interesse_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$cliente->interesse_cliente ?? ''}}">
                </div>
        </div>

            <div class="grid xl:grid-cols-3 xl:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Situação do cliente</label>
                    <select id="countries" name="spc_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{$cliente->spc_cliente ?? 'Selecionar'}}</option>
                        <option value="SEM_RENDA">SEM_RENDA</option>
                        <option value="SPC">SPC</option>
                        <option value="REPROVADO">REPROVADO</option>
                        <option value="JA_COMPROU">JA_COMPROU</option>
                        <option value="DESISTIU">DESISTIU</option>
                        <option value="SEM_RESPOSTA">SEM_RESPOSTA</option>
                        <option value="OUTROS">OUTROS</option>
                        <option value="DESISTIU">DESISTIU</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Funil</label>
                    <select id="countries" name="nivel_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{$cliente->nivel_cliente ?? 'Selecionar'}}</option>
                        <option value="QUENTE">QUENTE</option>
                        <option value="DOCUMENTOS">DOCUMENTOS</option>
                        <option value="ANALISE">ANALISE</option>
                        <option value="PENDENCIA">PENDENCIA</option>
                        <option value="FRIO">FRIO</option>
                        <option value="VENDIDO">VENDIDO</option>
                    </select>
                </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-400">Origem</label>
                        <select id="countries" name="origem_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{$cliente->origem_cliente ?? 'Selecionar'}}</option>
                            <option value="Indicado">Indicacão</option>
                            <option value="Anuncio">Anuncio</option>
                            <option value="Call">Call</option>
                            <option value="Roleta">Roleta</option>
                            <option value="Site">Site</option>
                            <option value="FaceBook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="PDV">PDV</option>
                        </select>
                    </div>
                </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Conversa</label>
<textarea id="message" name="conversa_cliente" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$cliente->conversa_cliente ?? ''}}</textarea>
   <br>
   @if(isset($cliente))

   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ATUALIZAR</button>

   @else

   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CADASTRAR  </button>

   @endif

                    </form>
<br>
                     <script src="{{ asset('js/meus.js') }}" defer></script>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
