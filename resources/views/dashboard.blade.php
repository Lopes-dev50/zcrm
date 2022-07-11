<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
   </x-slot>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <!--Replace with your tailwind.css once created-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
                   <!----------inicio------>
                   <div class="container w-full mx-auto pt-2">
                    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
                        <!--Console Content-->
<!------free---->
@can('free')
<div class="w-full  p-3">
    <!--Metric Card-->
    <a href="{{route ('escolherPlano')}}">
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-red-500">Mude hoje mesmo para o plano corretor, e tenha acesso a todas funcionalidade!</h5>
            </div>
        </div>
    </div>
    </a>
</div>
@endcan
<!-----free fim--->
<!----aviso------->
@if(isset($aviso)) @foreach($aviso as $avisos )
<div class="flex p-4 mb-4 text-sm text-{{$avisos->cor}}-700 bg-{{$avisos->cor}}-100 rounded-lg " role="alert">
    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div>
      <span class="font-medium">{{$avisos->titulo}}</span> {{$avisos->texto}}
    </div>
  </div>
  @endforeach @else  @endif
<!----aviso-fim----->
              @can('free')


<div class="flex flex-wrap">
                                <!--/inicio-->
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Metric Card-->
                                <div class="bg-white border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-500">Parados a 30 dias</h5>
                                            <h3 class="font-bold text-3xl">{{count($frio)}} </h3>
                                        </div>
                                    </div>
                                </div>
                                <!--/Metric Card-->
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Metric Card-->
                                <div class="bg-white border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-500">Novos Leads</h5>
                                            <h3 class="font-bold text-3xl">  {{count($leads)}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <!--/Metric Card-->
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Metric Card-->
                                <div class="bg-white border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-500">Tarefas Agendadas</h5>
                                            <h3 class="font-bold text-3xl">@if(isset($agenda)) {{count($agenda)}} @endif<span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                                <!--/Metric Card-->
                            </div>
                        </div>
                        <!--Divider-->
                       <div class="flex flex-row flex-wrap flex-grow mt-2">
                            <div class="w-full md:w-1/2 p-3">
                                <!--Graph Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Site</h5>
                                    </div>
                                    <div class="p-5">
                                        <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                                        <script>
                                        new Chart(document.getElementById("chartjs-7"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": [{{ Js::from($vlabels) }}],
                                                "datasets": [{
                                                    "label": "visita ao site",
                                                    "data": [{{ Js::from($vdata) }}],
                                                    "borderColor": "rgb(255, 99, 132)",
                                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                                }, {
                                                    "label": "Clicks nos imóveis",
                                                    "data": [{{ Js::from($cdata) }}],
                                                    "type": "line",
                                                    "fill": false,
                                                    "borderColor": "rgb(54, 162, 235)"
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                        </script>
                                    </div>
                                </div>
                                <!--/Graph Card-->
                            </div>
                            <div class="w-full md:w-1/2 p-3">
                                <!--Graph Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Clientes</h5>
                                    </div>
                                    <div class="p-5">
                                        <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                                        <script>
                                        new Chart(document.getElementById("chartjs-0"), {
                                            "type": "line",
                                            "data": {
                                                "labels": {{ Js::from($labels) }},
                                                "datasets": [{
                                                    "label": "Numero cadastro por mês",
                                                    "data": {{ Js::from($adata) }},
                                                    "fill": false,
                                                    "borderColor": "rgb(75, 192, 192)",
                                                    "lineTension": 0.1
                                                }]
                                            },
                                            "options": {}
                                        });
                                        </script>
                                    </div>
                                </div>
                                <!--/Graph Card-->
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Graph Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Origem dos clientes</h5>
                                    </div>
                                    <div class="p-5">
                                        <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                                        <script>
                                        new Chart(document.getElementById("chartjs-1"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": ["Indicado", "Roleta", "Anuncio", "Call", "Site", "Facebook", "Instagram", "PDV"],
                                                "datasets": [{
                                                    "label": "Numero",
                                                    "data": [{{count($Indicado)}},{{count($Roleta)}},{{count($Anuncio)}},{{count($Call)}},{{count($Site)}},{{count($Facebook)}},{{count($Instagram)}},{{count($PDV)}}],
                                                    "fill": false,
                                                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                                    "borderWidth": 1
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                        </script>
                                    </div>
                                </div>
                                <!--/Graph Card-->
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Graph Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Imoveis</h5>
                                    </div>
                                    <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                                        <script>
                                            new Chart(document.getElementById("chartjs-4"), {
                                                "type": "doughnut",
                                                "data": {
                                                    "labels": ["Pronto", "Planta", "Construção"],
                                                    "datasets": [{
                                                        "label": "Issues",
                                                        "data": [{{count($PRONTO)}},{{count($NAPLANTA)}},{{count($CONSTRUIDO)}}],
                                                        "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                                    }]
                                                }
                                            });
                                            </script>
                                    </div>
                                </div>
                                <!--/Graph Card-->
                            </div>
                            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                <!--Template Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Etiqueta dos clientes</h5>
                                    </div>
                                    <div class="p-5">
                                        <canvas id="chartjs-5" class="chartjs" width="undefined" height="undefined"></canvas>
                                        <script>
                                        new Chart(document.getElementById("chartjs-5"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": ["SemRenda", "SPC", "Reprovado", "Desistiu", "SemResposta", "Pesquisando", "Investidor", "Construtor", "MCMV", "Outros"],
                                                "datasets": [{
                                                    "label": "Numero",
                                                    "data": [{{count($Semrenda)}},{{count($SPC)}},{{count($Reprovado)}},{{count($Desistiu)}},{{count($Semresposta)}},{{count($Pesquisando)}},{{count($Investidor)}},{{count($Construtor)}},{{count($MCMV)}},{{count($Outros)}}],
                                                    "fill": false,
                                                    "backgroundColor": ["rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)","rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)"],
                                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)","rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)"],
                                                    "borderWidth": 1
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                        </script>

                                    </div>
                                </div>
                                <!--/Template Card-->
                            </div>
                            <div class="w-full p-3">
                                <!--Table Card-->
                                <div class="bg-white border rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Novos Leads</h5>
                                    </div>
                                    <div class="p-5">
                                        <table class="w-full p-5 text-gray-700">
                                            <thead>
                                                <tr>
                                                    <th class="text-left text-blue-900">Tempo</th>
                                                    <th class="text-left text-blue-900">Nome</th>
                                                    <th class="text-left text-blue-900">Cidade</th>
                                                    <th class="text-left text-blue-900">Procurando</th>
                                                    <th class="text-center text-blue-900">Atender</th>
                                                </tr>
                                            </thead>
                                         <tbody>
                                                @foreach ($leads as $lea )
                                                <tr>
                                                    <td>
                                                        @switch($h = \Carbon\Carbon::parse ($lea->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                                        @case(0)
                                                        Hoje
                                                            @break

                                                        @case(1)
                                                        Ontem
                                                            @break

                                                        @default
                                                      {{$h}} Dias
                                                     @endswitch
                                                    </td>
                                                    <td>{{$lea->nome_cliente}}</td>
                                                    <td>{{$lea->cidade_cliente}}</td>
                                                    <td>{{$lea->empreendimento_cliente}}</td>
                                                    <td class="text-center">  <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($lea->id) ],'edit')}}" class="inline-block text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p class="py-2">Boas Vendas!</p>
                                    </div>
                                </div>
                                <!--/table Card-->
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <!--/Metric Card-->
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-blue-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500">enviar Documentação</h5>
                                        <h3 class="font-bold text-3xl"> {{count($documento)}}  <span class="text-red-500"></span></h3>
                                    </div>
                                </div>
                            </div>
                            @foreach ($documento as $documentos)
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500"> Parado  @switch($h = \Carbon\Carbon::parse ($documentos->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                            @case(0)
                                            Hoje
                                                @break
                                            @case(1)
                                            Ontem
                                                @break
                                            @default
                                          {{$h}} Dias
                                         @endswitch</h5>
                                        <h3 class="font-bold text-2xl">{{$documentos->nome_cliente}} </h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500">Com Pendencia</h5>
                                        <h3 class="font-bold text-3xl"> {{count($pendencia)}}  <span class="text-red-500"></span></h3>
                                    </div>
                                </div>
                            </div>
                            @foreach ($pendencia as $pendencias)
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500">Parado  @switch($h = \Carbon\Carbon::parse ($pendencias->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                            @case(0)
                                            Hoje
                                                @break
                                            @case(1)
                                            Ontem
                                                @break
                                            @default
                                          {{$h}} Dias
                                         @endswitch</h5>
                                        <h3 class="font-bold text-2xl">{{$pendencias->nome_cliente}} </h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                            <!--Metric Card-->
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded p-3 bg-indigo-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500"> Em Analise</h5>
                                        <h3 class="font-bold text-3xl"> {{count($analise)}}  <span class="text-red-500"></span></h3>
                                    </div>
                                </div>
                            </div>
                            @foreach ($analise as $analises)
                            <div class="bg-white border rounded shadow p-2">
                                <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-center">
                                        <h5 class="font-bold uppercase text-gray-500">Parado  @switch($h = \Carbon\Carbon::parse ($analises->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                                            @case(0)
                                            Hoje
                                                @break

                                            @case(1)
                                            Ontem
                                                @break

                                            @default
                                          {{$h}} Dias
                                         @endswitch</h5>
                                        <h3 class="font-bold text-2xl">{{$analises->nome_cliente}} </h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--/Metric Card-->
                        </div>
                    </div>
                        <!--/ Console Content-->
                    </div>
                </div>
                @endcan
<!------fim---------->

<!------------corretor--------->
@can('corretor')
<div class="flex flex-wrap">
    <!--/inicio-->
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Metric Card-->
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-500">Parados a 30 dias</h5>
                <h3 class="font-bold text-3xl">{{count($frio)}} </h3>
            </div>
        </div>
    </div>
    <!--/Metric Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Metric Card-->
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-500">Novos Leads</h5>
                <h3 class="font-bold text-3xl">  {{count($leads)}}</h3>
            </div>
        </div>
    </div>
    <!--/Metric Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Metric Card-->
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-500">Tarefas Agendadas</h5>
                <h3 class="font-bold text-3xl">@if(isset($agenda)) {{count($agenda)}} @endif<span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
            </div>
        </div>
    </div>
    <!--/Metric Card-->
</div>
</div>
<!--Divider-->
<div class="flex flex-row flex-wrap flex-grow mt-2">
<div class="w-full md:w-1/2 p-3">
    <!--Graph Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Site</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
            new Chart(document.getElementById("chartjs-7"), {
                "type": "bar",
                "data": {
                    "labels": [{{ Js::from($vlabels) }}],
                    "datasets": [{
                        "label": "visita ao site",
                        "data": [{{ Js::from($vdata) }}],
                        "borderColor": "rgb(255, 99, 132)",
                        "backgroundColor": "rgba(255, 99, 132, 0.2)"
                    }, {
                        "label": "Clicks nos imóveis",
                        "data": [{{ Js::from($cdata) }}],
                        "type": "line",
                        "fill": false,
                        "borderColor": "rgb(54, 162, 235)"
                    }]
                },
                "options": {
                    "scales": {
                        "yAxes": [{
                            "ticks": {
                                "beginAtZero": true
                            }
                        }]
                    }
                }
            });
            </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>
<div class="w-full md:w-1/2 p-3">
    <!--Graph Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Clientes</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
            new Chart(document.getElementById("chartjs-0"), {
                "type": "line",
                "data": {
                    "labels": {{ Js::from($labels) }},
                    "datasets": [{
                        "label": "Numero cadastro por mês",
                        "data": {{ Js::from($adata) }},
                        "fill": false,
                        "borderColor": "rgb(75, 192, 192)",
                        "lineTension": 0.1
                    }]
                },
                "options": {}
            });
            </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Graph Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Origem dos clientes</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
            new Chart(document.getElementById("chartjs-1"), {
                "type": "bar",
                "data": {
                    "labels": ["Indicado", "Roleta", "Anuncio", "Call", "Site", "Facebook", "Instagram", "PDV"],
                    "datasets": [{
                        "label": "Numero",
                        "data": [{{count($Indicado)}},{{count($Roleta)}},{{count($Anuncio)}},{{count($Call)}},{{count($Site)}},{{count($Facebook)}},{{count($Instagram)}},{{count($PDV)}}],
                        "fill": false,
                        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                        "borderWidth": 1
                    }]
                },
                "options": {
                    "scales": {
                        "yAxes": [{
                            "ticks": {
                                "beginAtZero": true
                            }
                        }]
                    }
                }
            });
            </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Graph Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Imoveis</h5>
        </div>
        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
                new Chart(document.getElementById("chartjs-4"), {
                    "type": "doughnut",
                    "data": {
                        "labels": ["Pronto", "Planta", "Construção"],
                        "datasets": [{
                            "label": "Issues",
                            "data": [{{count($PRONTO)}},{{count($NAPLANTA)}},{{count($CONSTRUIDO)}}],
                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                        }]
                    }
                });
                </script>
        </div>
    </div>
    <!--/Graph Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
    <!--Template Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Etiqueta dos clientes</h5>
        </div>
        <div class="p-5">
            <canvas id="chartjs-5" class="chartjs" width="undefined" height="undefined"></canvas>
            <script>
            new Chart(document.getElementById("chartjs-5"), {
                "type": "bar",
                "data": {
                    "labels": ["SemRenda", "SPC", "Reprovado", "Desistiu", "SemResposta", "Pesquisando", "Investidor", "Construtor", "MCMV", "Outros"],
                    "datasets": [{
                        "label": "Numero",
                        "data": [{{count($Semrenda)}},{{count($SPC)}},{{count($Reprovado)}},{{count($Desistiu)}},{{count($Semresposta)}},{{count($Pesquisando)}},{{count($Investidor)}},{{count($Construtor)}},{{count($MCMV)}},{{count($Outros)}}],
                        "fill": false,
                        "backgroundColor": ["rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)","rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)"],
                        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)","rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)"],
                        "borderWidth": 1
                    }]
                },
                "options": {
                    "scales": {
                        "yAxes": [{
                            "ticks": {
                                "beginAtZero": true
                            }
                        }]
                    }
                }
            });
            </script>

        </div>
    </div>
    <!--/Template Card-->
</div>
<div class="w-full p-3">
    <!--Table Card-->
    <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
            <h5 class="font-bold uppercase text-gray-600">Novos Leads</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-left text-blue-900">Tempo</th>
                        <th class="text-left text-blue-900">Nome</th>
                        <th class="text-left text-blue-900">Cidade</th>
                        <th class="text-left text-blue-900">Procurando</th>
                        <th class="text-center text-blue-900">Atender</th>
                    </tr>
                </thead>
             <tbody>
                    @foreach ($leads as $lea )
                    <tr>
                        <td>
                            @switch($h = \Carbon\Carbon::parse ($lea->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                            @case(0)
                            Hoje
                                @break

                            @case(1)
                            Ontem
                                @break

                            @default
                          {{$h}} Dias
                         @endswitch
                        </td>
                        <td>{{$lea->nome_cliente}}</td>
                        <td>{{$lea->cidade_cliente}}</td>
                        <td>{{$lea->empreendimento_cliente}}</td>
                        <td class="text-center">  <a href="{{route('add_edit_cliente',['id' =>$enc->encriptar($lea->id) ],'edit')}}" class="inline-block text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="py-2">Boas Vendas!</p>
        </div>
    </div>
    <!--/table Card-->
</div>
</div>
<div class="flex flex-wrap">
<!--/Metric Card-->
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
<!--Metric Card-->
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-blue-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
        </div>
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">enviar Documentação</h5>
            <h3 class="font-bold text-3xl"> {{count($documento)}}  <span class="text-red-500"></span></h3>
        </div>
    </div>
</div>
@foreach ($documento as $documentos)
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500"> Parado  @switch($h = \Carbon\Carbon::parse ($documentos->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                @case(0)
                Hoje
                    @break
                @case(1)
                Ontem
                    @break
                @default
              {{$h}} Dias
             @endswitch</h5>
            <h3 class="font-bold text-2xl">{{$documentos->nome_cliente}} </h3>
        </div>
    </div>
</div>
@endforeach
<!--/Metric Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
<!--Metric Card-->
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
        </div>
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Com Pendencia</h5>
            <h3 class="font-bold text-3xl"> {{count($pendencia)}}  <span class="text-red-500"></span></h3>
        </div>
    </div>
</div>
@foreach ($pendencia as $pendencias)
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Parado  @switch($h = \Carbon\Carbon::parse ($pendencias->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                @case(0)
                Hoje
                    @break
                @case(1)
                Ontem
                    @break
                @default
              {{$h}} Dias
             @endswitch</h5>
            <h3 class="font-bold text-2xl">{{$pendencias->nome_cliente}} </h3>
        </div>
    </div>
</div>
@endforeach
<!--/Metric Card-->
</div>
<div class="w-full md:w-1/2 xl:w-1/3 p-3">
<!--Metric Card-->
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-indigo-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
        </div>
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500"> Em Analise</h5>
            <h3 class="font-bold text-3xl"> {{count($analise)}}  <span class="text-red-500"></span></h3>
        </div>
    </div>
</div>
@foreach ($analise as $analises)
<div class="bg-white border rounded shadow p-2">
    <div class="flex flex-row items-center">
        <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Parado  @switch($h = \Carbon\Carbon::parse ($analises->updated_at)->diffInDays(date("Y-m-d H:i:s")))
                @case(0)
                Hoje
                    @break

                @case(1)
                Ontem
                    @break

                @default
              {{$h}} Dias
             @endswitch</h5>
            <h3 class="font-bold text-2xl">{{$analises->nome_cliente}} </h3>
        </div>
    </div>
</div>
@endforeach
<!--/Metric Card-->
</div>
</div>
<!--/ Console Content-->
</div>
</div>
<!------fim---------->


@endcan


<!------------gerente----------->
@can('gerente')
   <div>
    <p class="p-4 font-sans font-center text-xl text-gray-500">Olá seja bem vindo gerente!</p>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   </div>
@endcan
               <!--/container-->
                <footer class="bg-white border-t border-gray-400 shadow">
                    <div class="container max-w-lg mx-auto flex py-8">
                        <div class="w-full mx-auto flex flex-wrap">
                            <div class="flex w-full md:w-1/2 ">
                                <div class="px-2">
                                    <a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/certidoes-e-situacao-fiscal" target="_blank">
                                    <h3 class=" font-bold text-gray-900">CND</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="px-2">
                                    <a href="https://servicos.receita.fazenda.gov.br/Servicos/ConsRest/Atual.app/paginas/index.asp" target="_blank">
                                        <h3 class=" font-bold text-gray-900">IR</h3>
                                        </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-auto flex flex-wrap">
                            <div class="flex w-full md:w-1/2 ">
                                <div class="px-2">
                                    <a href="http://www.tse.jus.br/eleitor/servicos/titulo-de-eleitor/titulo-e-local-de-votacao/consulta-por-nome" target="_blank">
                                        <h3 class=" font-bold text-gray-900">Titulo</h3>
                                        </a>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="px-2">
                                    <a href="https://smallpdf.com/pt/compressor-de-pdf" target="_blank">
                                        <h3 class=" font-bold text-gray-900">PDF</h3>
                                        </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-auto flex flex-wrap">
                            <div class="flex w-full md:w-1/2 ">
                                <div class="px-8">
                                    <a href="http://www8.caixa.gov.br/siopiinternet-web/simulaOperacaoInternet.do?method=inicializarCasoUso" target="_blank">
                                        <h3 class=" font-bold text-gray-900">Caixa</h3>
                                        </a>
                                </div>
                            </div>
                            <div class="flex w-full md:w-1/2">
                                <div class="px-8">
                                    <a href="https://www.portaldeempreendimentos.caixa.gov.br/simulador/" target="_blank">
                                        <h3 class=" font-bold text-gray-900">Correpondente</h3>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

