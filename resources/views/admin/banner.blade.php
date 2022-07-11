<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Cadastrar Banner.</h3>
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
                        <form action=" {{ route('add_banner')}}" method="post" >
                        <div class="grid xl:grid-cols-3 xl:gap-6">
                            @csrf
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="valor" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Valor</label>
                                <input type="number" id="valor" name="valor" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Frase</label>
                                <input type="text" id="frase" name="frase" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                </div>
                            </div>
                              <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                CADASTRAR
                                </button>
                               </a>
                        </form>
                           <br>
                           Banner:
                           <br>
                           @foreach ($banner as $banner )
                          <div class="w-272 bg-white rounded-lg shadow-xl p-6 ">
                            <p class="text-5xl pb-8 ">{{$banner->valor}}</p>
                              <p class="text-3xl pb-8"> {{$banner->frase}} </p>
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                   <a href="{{route('deletar_banner',['id' =>$enc->encriptar($banner->id )],'deletar_banner')}}">
                                    <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                     DELETAR BANNER
                                    </button>
                                   </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
              </div>
           </div>
         </div>
</x-app-layout>


