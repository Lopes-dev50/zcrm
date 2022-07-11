<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Cadastrar Aviso.</h3>
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




                        <form action=" {{ route('add_info')}}" method="post" >
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
                                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Cor</label>
                                        <select id="cor" name="cor" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="indigo">Indigor</option>
                                            <option value="red">Vermalho</option>
                                            <option value="green">Verde</option>
                                        </select>
                                    </div>
                                </div>
                                  <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    CADASTRAR
                                    </button>
                                   </a>
                            </form>
                               <br>
                              Aviso:
                               <br>
                               @foreach ($aviso as $aviso)
                               <div class="rounded-md flex items-center jusitfy-between px-5 py-4 mb-2 border border-{{$aviso->cor}}-500 text-{{$aviso->cor}}-800">
                                   <div class="w-full flex items-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" w-6 h-6 mr-2" viewBox="0 0 1792 1792">
                                           <path d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z">
                                           </path>
                                       </svg>
                                      <p class="pr-4 "> {{$aviso->titulo}}</p>{{$aviso->texto}}
                                   </div>
                                   <a href="{{route('deletar_aviso',['id' =>$enc->encriptar($aviso->id )],'destroy')}}">
                                    <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        DELETAR
                                        </button>
                                  </a>
                               </div>
                               @endforeach
                              </div>
                        </div>
                     <!----------------------------------->
                    </div>
                  </div>
              </div>
           </div>
         </div>
</x-app-layout>


