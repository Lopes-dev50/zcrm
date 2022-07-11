<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
        <p class="font-sans font-light text-xl text-gray-500">E-mail!</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   @foreach ($clientes as $cli )
                    <form action=" {{route('add_emailunico') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="nome_cliente" placeholder="{{$cli->nome_cliente}}" value="{{$cli->nome_cliente}}" id="input1" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 mt-8 block focus:ring-blue-500 focus:border-blue-500 text-gray-700" >
                          </div>
                          <div>
                            <input type="text" name="email_cliente" placeholder="{{$cli->email_cliente}}" value="{{$cli->email_cliente}}" id="input1" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 mt-8 block focus:ring-blue-500 focus:border-blue-500 text-gray-700" >
                          </div>
                          <div>
                            <input type="text"  name="assunto" value="" id="input1" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 mt-8 block focus:ring-blue-500 focus:border-blue-500 text-gray-700" placeholder="Assunto">
                          </div>
                          @endforeach
                   <div>
                    <label for="input1" class="text-sm text-gray-800 block mb-1 font-medium">
                      <br>
                    </label>
                    <textarea
                      rows="4"
                      cols="100"
                      name="mensagem"
                      id="input1"
                      value=""
                      class="bg-gray-100 rounded border border-gray-200 py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                      placeholder="Mensagem"
                    ></textarea>
                  </div>
                  <br>
                  <button type="submit"
                  class="py-1.5 px-4 transition-colors bg-green-600 border active:bg-green-800 font-medium border-green-700 text-white rounded-lg hover:bg-green-700 disabled:opacity-50">
                  Enviar
                </button>
                    </form>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

