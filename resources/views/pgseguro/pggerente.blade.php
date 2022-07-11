<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Escolha o plano de pagamento.</h3>
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
                    <div class="flex flex-wrap pl-8 pb-8 items-center">
                        @foreach ($valor as $val )
                        <div class="basis-1/4 pr-4 pt-8">

                            <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{$val->perildo}}</h5>
                                <div class="flex items-baseline text-gray-900 dark:text-white">
                                    <span class="text-3xl font-semibold">R$</span>
                                    <span class="text-5xl font-extrabold tracking-tight"> {{number_format($val->valores, 2, ',', '.'); }}</span>
                                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400"></span>
                                </div>
                                <!-- List -->
                                <ul role="list" class="my-7 space-y-5">

                                </ul>
                                <a href="{{ route('novogerente', ['id' =>$enc->encriptar($val->id) ],'novogerente')}}">
                                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">ESCOLHER PLANO</button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                      </div>
                    <!------------>
                  </div>
              </div>
           </div>
         </div>
       </x-app-layout>


