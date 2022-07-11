<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3 class="font-sans font-light text-xl text-gray-500">Seu plano voltou a ser FREE!</h3>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!----------->
                   <p class="font-sans font-light text-xl text-gray-500">Por falta de pagamento seu plano voltou a ser FREE!</p>
                   <p class="font-sans font-light text-xl text-gray-500 p-8">Escolha o perildo de pagamento para renovar, o seu acesso total ao sistema.</p>
                   <a href="{{ route('pgrenovar')}}">
                    <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                      RENOVAR
                    </button>
                    </a>
                    <!------------>
                  </div>
              </div>
           </div>
         </div>
       </x-app-layout>


