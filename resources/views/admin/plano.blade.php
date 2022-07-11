<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
           <h3>Lucros.</h3>
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
                         <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
 <!-- inicio -->
 @foreach ($planos as $plano )
 <form action=" {{ route('add_plano', ['id' => $plano->id])}}" method="post" >
    <div class="flex flex-nowrap">
        @csrf
        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="valor" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Perildo</label>
            <input type="text" id="valor" name="perildo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$plano->perildo}}">
            </div>
        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Valor</label>
            <input type="text" id="frase" name="valores" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$plano->valores}}">
            </div>

        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Nivel</label>
            <input type="text" id="frase" name="nivel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$plano->nivel}}">
            </div>

        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Dias</label>
            <input type="text" id="frase" name="dia" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="{{$plano->dia}}">
            </div>
        </div>

          <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            Atualizar
            </button>
           </a>
    </form>
    @endforeach


</div>
</div>
<br>
Cadastro
<hr>
<form action=" {{ route('cadd_plano')}}" method="post" >
    <div class="flex flex-nowrap">
        @csrf
        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="valor" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Perildo</label>
            <input type="text" id="valor" name="perildo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Valor</label>
            <input type="text" id="frase" name="valores" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>

        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Nivel</label>
            <input type="text" id="frase" name="nivel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>

        <div class="relative z-0 w-full mb-6 p-4 group">
            <label for="frase" class="block mb-2 text-sm font-medium text-gray-400 dark:text-gray-400">Dias</label>
            <input type="text" id="frase" name="dia" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
        </div>

          <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
          Cadastrar
            </button>
           </a>
    </form>
</div>
</div>
</div>

  <!-- Fim -->



                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                  </div>
              </div>
           </div>
         </div>

</x-app-layout>


