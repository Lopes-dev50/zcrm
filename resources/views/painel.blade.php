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
        <p class="p-4 font-sans font-light text-xl text-gray-500">Atualizar dados!</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>

                   <form method="POST" action="{{ route('painel_edit', ['id' =>$enc->encriptar( Auth::user()->id )], 'painel_edit') }}">
                    @csrf
                   <div class="flex flex-wrap px-12 mx-auto">
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" id="create-account-pseudo" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="name" value="{{$user->name}}"/>
                    </div>
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" id="telefone" maxlength="15" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="celular" placeholder="Celular?" value="{{$user->celular}}"/>
                    </div>
                    </div>
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="CPF" id='cpfInput' placeholder='CPF?' oninput='cpfChange(this.value)' value="{{$user->CPF}}"/>
                    </div>
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" id="create-account-pseudo" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="cidade" placeholder="Cidade?" value="{{$user->cidade}}"/>
                    </div>
                   </div>
                   <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" id="create-account-pseudo" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="creci" placeholder="CRECI?" value="{{$user->creci}}"/>
                    </div>
                    <div class="pb-4 pr-4 w-full">
                        <input type="text" id="create-account-pseudo" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"  placeholder="PLANO ATUAL {{$user->plano}}" />
                    </div>
                   </div>
                   <div class="grid xl:grid-cols-3 xl:gap-6">
                    <div class="pb-4 pr-4 w-full">
                        <label class="text-gray-700" for="onde">
                            <br>
                           <h6 class="text-gray-700"> Como soube do CrmCorretor?</h6>
<select class="block w-52 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="onde">
    <option value="{{$user->onde}}">
    {{$user->onde}}
    </option>

    <option value="Indicacão">
        Indicacão
    </option>
    <option value="Anuncio">
        Anuncio
    </option>
    <option value="youyube">
        youyube
    </option>
    <option value="Facebook">
        Facebook
    </option>
    <option value="Instagram">
        Instagram
    </option>
    <option value="Site">
      Site Cliente Corretor
    </option>
</select>
                        </label>
                  </div>

                   </div>
                   <div class="pb-4 pr-4 w-full">
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar</button>
                </form>
                </div>
                <br>
                <hr>
                   <!-----------fim-------->
                   <script src="{{ asset('js/meus.js') }}" defer></script>
                </div>
            </div>
            <p class="p-4 pl-4 font-sans font-light text-xl text-gray-500">Financeiro.</p>

                @foreach ($valor as $valo )
                <div class="p-2 pl-4 font-sans font-light text-xl text-gray-500">Status {{$valo->pagamento}} -- {{date('F d, Y', strtotime($valo->created_at))}} </div>
                @endforeach
        </div>
    </div>
</x-app-layout>
