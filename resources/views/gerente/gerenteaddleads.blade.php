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
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="content-header">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">

                        <form action=" {{ route('gerente_add_leads')}}" method="post" >
                            @csrf
                        <div class="grid xl:grid-cols-3 xl:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Nome</label>
                                <input type="text" id="renda_cliente" name="nome_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Celular</label>
                                <input type="text" id="telefone" name="celular_cliente" maxlength="15" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>

                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Bairro</label>
                                    <input type="text" id="bairro" name="bairro_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Email</label>
                                        <input type="email" id="bairro" name="email_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Para o corretor</label>
                                            <select id="countries" name="id" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0">Nenhuma</option>
                                                @foreach ($corretor as $corretors)
                                                    <option value="{{ $corretors->id}}">{{ $corretors->name}}</option>
                                                @endforeach;
                                         </select>
                                        </div>
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ENVIAR</button>
                                    </div>
                                    </form>
                            </div>
<br>
<hr>
<br>
                            <h5>Lista de leads enviado em aberto.</h5>
                            @if(isset($lead))

                            @foreach ($lead as $leads )
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="valorcondominio" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">{{ $leads->corretor}}</label>
                                    <input type="text" id="valorcondominio" name="valorcondominio" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  placeholder="{{ $leads->nome_cliente}}">
                                    </div>
                                </div>
                                @endforeach
                                @endif
<!-------------------------------->
                    </div>
                  </div>
              </div>
           </div>
         </div>
         <script src="{{ asset('js/meus.js') }}" defer></script>
</x-app-layout>


