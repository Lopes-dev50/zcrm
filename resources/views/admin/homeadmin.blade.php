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

   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>

                  <div class="flex flex-row">
                    <div class="w-full pr-4">
                        <div class="shadow-lg rounded-lg overflow-hidden">
                            <div class="py-3 px-5 bg-gray-50"></div>
                            <canvas class="p-10" id="chartPie"></canvas>
                          </div>

                    </div>

                    <div class="w-full pr-4">
                        <div class="shadow-lg rounded-lg overflow-hidden">
                            <div class="py-3 px-5 bg-gray-50"></div>
                            <canvas class="p-10" id="chartDoughnut"></canvas>
                          </div>
                    </div>

                  </div>
<br>
<br>


                    <div class="flex flex-row">
                    <div class="w-full">
                      <div class="shadow-lg rounded-lg overflow-hidden">
                        <div class="py-3 px-5 bg-gray-50"></div>
                        <canvas class="p-10" id="chartBar"></canvas>
                      </div>
                    </div>

                  </div>
<br>
<br>



                  </div>






                  <!-- Required chart.js -->
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                  <!-- Chart pie -->
                  <script>
                    const dataPie = {
                      labels: ["Free", "Corretor ", "Gerente"],
                      datasets: [
                        {
                          label: "Clientes:",
                          data: [{{count($free)}},{{count($corretor)}},{{count($gerente)}}],
                          backgroundColor: [
                            "rgb(245, 34, 41)",
                           "rgb(153, 50, 204)",
                            "rgb(46, 139, 87)",
                          ],
                          hoverOffset: 4,
                        },
                      ],
                    };

                    const configPie = {
                      type: "pie",
                      data: dataPie,
                      options: {},
                    };

                    var chartBar = new Chart(document.getElementById("chartPie"), configPie);
                  </script>
<!---------------------------------------------->
<!-- Chart doughnut -->
<script>
    const dataDoughnut = {
      labels: ["Indicado", "Anuncio", "Youtube", "Facebook", "Instagram"],
      datasets: [
        {
          label: "Origem:",
          data: [{{count($Indicado)}},{{count($Anuncio)}},{{count($Youtube)}},{{count($Facebook)}},{{count($Instagram)}}],
          backgroundColor: [
            "rgb(33, 105, 141)",
            "rgb(50,205,50)",
            "rgb(31, 243, 241)",
            "rgb(201, 63, 241)",
            "rgb(245, 34, 41)",
            "rgb(255,255,0)",
            "rgb(55,155,0)",
            "rgb(0,0,205)",
          ],
          hoverOffset: 4,
        },
      ],
    };

    const configDoughnut = {
      type: "doughnut",
      data: dataDoughnut,
      options: {},
    };

    var chartBar = new Chart(
      document.getElementById("chartDoughnut"),
      configDoughnut
    );
  </script>


<!------------------------------------------>
<!-- Chart bar -->
<script>
    const labelsBarChart = [
      "Pagante",
      "Não Pagante",



    ];
    const dataBarChart = {
      labels: labelsBarChart,
      datasets: [
        {
          label: "Usuario ",
          backgroundColor: "hsl(152, 82.9%, 67.8%)",
          borderColor: "hsl(152, 82.9%, 67.8%)",
          data: [{{count($pagante)}},{{count($naopagante)}}],
        },
      ],
    };

    const configBarChart = {
      type: "bar",
      data: dataBarChart,
      options: {},
    };

    var chartBar = new Chart(
      document.getElementById("chartBar"),
      configBarChart
    );
  </script>

  <!------------------------------------>

                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
