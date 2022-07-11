<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
        <p class="font-sans font-light text-xl text-gray-500">Ver relatório da equipe por corretor.</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                @foreach ($equipe as $equi )
                <a href="{{ route('add_relatorio',['id' =>$enc->encriptar($equi->id ) ] ,'add_relatorio') }}">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        {{$equi->name}}
                    </span>
                  </button>
                </a>
                @endforeach
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

