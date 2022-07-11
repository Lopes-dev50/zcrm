<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
        <p class="font-sans font-light text-xl text-gray-500">Ativar Notificações</p>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <p class="font-sans font-light text-xl text-gray-500">Para receber as todas as notificações e também de novos leads.</p>
                   <p class="font-sans font-light text-xl text-gray-500">Deve ativar recebimento por e-mail.</p>
                   <p class="font-sans font-light text-xl text-gray-500">Depois de ativar, será enviado um e-mail de confirmação, para sua caixa de e-mail, onde deve confirmar ativação, verificar que pode chegar como spam.</p>
                   <br>
                   @if ($user->notifica == 0)
                   <a href="{{ route('add_notifica',['id' =>$enc->encriptar($user->id ) ] ,'add_notifica') }}">
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ATIVAR AGORA!</button>
                   </a>
                   @endif
                   @if ($user->notifica == 1)
                   <p class="font-sans font-light text-2xl text-red-700">Foi enviado um e-mail para: {{$user->email}} abra seu e-mail ative as notificações.</p>
                   @endif
                   @if ($user->notifica == 2)
                   <p class="font-sans font-light text-2xl text-blue-700">Notificações ativas.</p>
                   @endif
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

