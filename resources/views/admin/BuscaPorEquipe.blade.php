<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('grafico_ano', 'grafico_ano')" :active="request()->routeIs('grafico_ano')">
            {{ __('GRAFICO ANUAL') }}
        </x-nav-link>
        <x-nav-link :href="route('grafico_mes', 'grafico_mes')" :active="request()->routeIs('grafico_mes')">
            {{ __('GRAFICO MENSAL') }}
        </x-nav-link>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="d-grid gap-2">

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                          <section class="content">
                            <div class="container-fluid">
                              <div class="card-body">
                                 <div class="row">
<!--------------------------->




<canvas id="myChart" width="1000" height="400"></canvas>
<p>
    <button onclick="preecher()">
        Preencher Gráfico
      </button>
    <canvas id="meugrafico"></canvas>

<!---------------------------------------->


          </div>



                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/Chart/dist/chart.js')}}"></script>
    <script type="text/javascript">

        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};

        const data = {
          labels: labels,
          datasets: [{
            label: 'Corretor Na Equipe',
            backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
            data: users,
          }]
        };

        const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );

  </script>

<script type="text/javascript">
const meses  = {{ Js::from($labels) }};

const receita = {{ Js::from($data) }};
const despesa = {{ Js::from($data) }};

var chart = new Chart(meugrafico, {
  type: 'line',
  data: {
    labels: meses,
    datasets: [
      {
        label:'Novos Usuarios',
        backgroundColor: 'transparent',
        borderColor: 'blue',
      },
      {
        label: 'Despesas',
        backgroundColor: 'transparent',
        borderColor: 'red',
      }
    ]
  }

})

function preecher(){
    chart.data.datasets[0].data = receita ;
    chart.data.datasets[1].data = despesa;
    chart.update();
}
</script>


</x-app-layout>

