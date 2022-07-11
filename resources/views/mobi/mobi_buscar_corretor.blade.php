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
                        <form action=" {{ route('mobi_add_corretor')}}" method="post" >
                            @csrf
                        <div class="grid xl:grid-cols-3 xl:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Email</label>
                                <input type="number" id="renda_cliente" name="numero" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">CPF</label>
                                <input type="text" name="CPF"  id='cpfInput'  oninput='cpfChange(this.value)' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">BUSCAR</button>
                                    </div>
                                    </form>
                                   </div>
                                <br>
                                <hr>
                                @if(isset($corretor))
                                @foreach ($corretor as $corretor )
                                <a href="{{route(' mobi_add_um_corretor',['id' =>$enc->encriptar($corretor->id )],'add_um_corretor')}}">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADICIONAR</button>
                                  Adicionar -  {{$corretor->usuario}}
                                </a>
                                 @endforeach
                                @endif

                                <br>
                                <h6 class="text-sm font-medium text-gray-600" >Os clientes do corretor removido serão distribuidos automaticamente para outros corretores da equipe</h6>
                                <br>
                            <h5 class="text-sm font-medium text-gray-600">Lista de corretores:</h5>
                            @if(isset($corretore))

                            @foreach ($corretore as $corretore )
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                <div class="relative z-0 w-20 mb-6 group">
                                    <form action=" {{ route('mobi_remove_corretor', ['id' =>$enc->encriptar($corretore->id )] )}}" method="post" >

                                <div class="flex items-center">
                                    <button type="submit" class="w-full flex items-center border-l border-t border-b text-base font-medium rounded-l-md text-black bg-red-500 hover:bg-red-500 px-4 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>

                                    </button>
                                    <button type="button" class="w-full border text-base font-medium rounded-r-md text-black bg-white hover:bg-gray-100 px-4 py-2">
                                        {{ $corretore->name}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                     @endforeach
                        @endif
<!---------------->
<script src="{{ asset('js/meus.js') }}" defer></script>
                    </div>
                  </div>
              </div>
           </div>
         </div>
</x-app-layout>


