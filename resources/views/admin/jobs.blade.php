<x-app-layout>
    <x-slot name="header">

        <p class="font-sans font-light text-xl text-gray-500">Falha no jobs!</p>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <a href="{{ route ('deletajobs')}}">
                   <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Limpar</button>
                   </a>
                   <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    payload
                                </th>
                            </tr>
                        </thead>
                        @foreach ($jobs as $jobs )
                        <tbody>
                           <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$jobs->exception}}
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

