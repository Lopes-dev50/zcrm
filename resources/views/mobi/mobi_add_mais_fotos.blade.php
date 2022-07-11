<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
        <p class="font-sans font-light text-xl text-gray-500">Galeria</p>
   </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <form action=" {{ route('mobi_add_fotos',['id' =>$enc->encriptar( $imovel->id )], 'add_fotosmobi')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex mt-2 pr-4 ">
                        <div class=" basis-1/4 p-3 pr-4">
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 w-300 mb-6 group">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-600" for="user_avatar">Foto</label>
                    <input class="block w-300 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" name="image" type="file">
                    <div class="mt-1 text-sm text-gray-700 dark:text-gray-600" id="user_avatar_help">(jpeg,png,jpg,svg|max:1Mega)</div>
                    </div>
                </div>
                <div class=" basis-1/4 p-3 pr-4">
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CADASTRAR  </button>
                </div>
                </div>
             </div>
                </form>

                  <hr>
                  <br>
                  <div class="flex flex-wrap">

                    @foreach ($galeria as $galerias )
                    <div class="flex mt-2 pr-4 ">
                    <div class="p-3 pr-4">
                       <div class=" bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                           <button class='relative  font-bold overflow-hidden'>
                           <img class="rounded-t-lg m-2" src="{{ asset("storage/$galerias->foto") }}" width="250" height="250" alt="">
                       </button>
                        <a href="{{route('mobi_deletar_foto',['id' =>$enc->encriptar($galerias->id )],'deletar_fotomobi')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                              </svg>
                        </a>
                           </div>
                        </div>
                    </div>
                       @endforeach
                   <!-----------fim-------->
                </div>
            </div>
        </div>   </div>
</x-app-layout>

