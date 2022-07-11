<x-app-layout>
    <x-slot name="header">


        <x-nav-link :href="route('nivel_usuario', 'nivel_usuario')" :active="request()->routeIs('nivel_usuario')">
            {{ __('teste') }}
        </x-nav-link>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="d-grid gap-2">



<!------------------------------------------------------------------------------------->

<div class="flex flex-row">




    <div class="w-full pr-4">
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50"></div>
            <canvas class="p-10" id="chartLine"></canvas>
          </div>
    </div>

  </div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
const labels = {{ Js::from($labels) }};
const labelsc = {{ Js::from($labelsc) }};
const data = {
labels: labels,
labelsc: labelsc,
datasets: [
{
label: "Clientes Cadastrados:",
backgroundColor: "hsl(252, 82.9%, 67.8%)",
borderColor: "hsl(252, 82.9%, 67.8%)",
data: {{ Js::from($data) }},
},
],
};


const configLineChart = {
type: "line",
data,
options: {},
};

var chartLine = new Chart(
document.getElementById("chartLine"),
configLineChart
);
</script>






</x-app-layout>

