<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Cadastrar suporte.</h3>
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
                 


                        <form action=" {{ route('add_suporte')}}" method="post" >
                            <div class="grid xl:grid-cols-3 xl:gap-6">
                                @csrf
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Titulo</label>
                                    <input type="text" id="titulo" name="titulo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                    </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="texto" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Texto</label>
                                    <input type="text" id="texto" name="texto" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <label for="video" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Vídeo</label>
                                        <input type="text" id="video" name="video" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
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
                               <div class="flex flex-wrap">
                                @foreach ($suporte as $suporte )
                                <div class="basis-1/2 pr-4">
                                   <div class="grid md:grid-cols-1 gap-6">
                                        <div
                                          class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden"
                                          style="padding-top: 6.25%"
                                        >
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$suporte->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                        </div>
                                      </div>
                                      <a href="{{route('deletar_suporte',['id' =>$suporte->id ],'deletar_suporte')}}">
                                        <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                            DELETAR
                                            </button>
                                      </a>
                                </div>
                                @endforeach
                              </div>
                        </div>






      <!------------------------->
                    </div>
                  </div>
              </div>
           </div>
         </div>

</x-app-layout>



