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
            <div class="pr-4 dark:text-gray-400" >Site.</div>
            </div>
   </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b bg-white">
   @foreach ($site as $site )
                   <!----------inicio------>
                   <form action="{{ route('configura_site_edit',['id' =>$enc->encriptar($site->id ) ] ,'configura_site_edit') }}" method="post" enctype="multipart/form-data">
                                 @csrf
    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nome Site</label>
        <input type="text" id="text" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ $site->name }}">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Titulo</label>
        <input type="text" id="text" name="sobre"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{ $site->sobre }}">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pix do facebook</label>
            <input type="text" id="text" name="pix" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$site->pix ?? ''}}">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pagina do facebook</label>
        <input type="text" id="fabebookusuario" name="fabebookusuario" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{ $site->fabebookusuario }}">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pagina do Instagram</label>
        <input type="text" id="instagramusuario" name="instagramusuario" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{ $site->instagramusuario }}">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="cidade_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Canal Youtube</label>
            <input type="text" id="youtubeusuario" name="youtubeusuario" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{ $site->youtubeusuario }}">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
       </div>
            <div class="grid xl:grid-cols-3 xl:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Cor do Site</label>
                    <select id="countries" name="cor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{$site->cor ?? 'Selecionar'}}</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="pink">Pink</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="indigo">Indigo</option>
                        <option value="gray">Gray</option>
                    </select>
                </div>
                </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Texto do Titulo</label>
<textarea id="message" name="sobretexto" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('texto')}}{{$site->sobretexto ?? ''}}</textarea>
   <br>
   <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500" for="user_avatar">Logo</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" name="image" type="file">
    <div class="mt-1 text-sm text-gray-500 dark:text-gray-500" id="user_avatar_help">Logo 60x220 PIX (jpeg,png,jpg|max:1Mega)</div>
   </div>
   <div class="relative z-0 w-full mb-6 group">
    <nav class="bg-{{$site->cor}}-500 border-gray-200 px-2 sm:px-4 py-2.5 ">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
          <a href="#" class="flex items-center">
            @if ($site->logo != ' ')
            <img src="{{ asset("storage/site/$site->logo") }}" height="90" width="125" class="mr-3 h-6 sm:h-9" alt="Logo" />
            @else
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{$sit->name}}</span>
            @endif
          </a>
          <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
          <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
              <li>
                <button type="button" class="w-full  text-{{$site->cor}}-500 bg-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                   (xx) 9999-99999
                    </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </div>
   </div>
   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ATUALIZAR</button>
  </form>
<br>
@endforeach
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
