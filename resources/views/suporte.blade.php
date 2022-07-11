<x-app-layout>
    <x-slot name="header">
        @can('free')
        <p class="font-sans font-light text-xl text-gray-500">Suporte! </p>
        @endcan
        @can('corretor')
        <p class="font-sans font-light text-xl text-gray-500">Suporte via WhatsApp (51)9740-1495 </p>
        @endcan
        @can('gerente')
        <p class="font-sans font-light text-xl text-gray-500">Suporte via WhatsApp (51)9740-1495 </p>
        @endcan
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                   <div class="flex flex-wrap">
                    @foreach ($suporte as $suporte )
                    <div class="basis-1/2 pr-4">
                       <div class="grid md:grid-cols-1 gap-6">
                            <div
                              class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden"
                              style="padding-top: 6.25%">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$suporte->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
                          </div>
                    </div>
                    @endforeach
                  </div>
                 <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
