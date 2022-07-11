<?php
$link= $_GET['idc'];
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</head>
<body>

<div class="bg-indigo-900 relative overflow-hidden h-screen">
    <img src="success.jpg" class="absolute h-full w-full object-cover"/>
    <div class="inset-0 bg-black opacity-25 absolute">
    </div>
    <header class="absolute top-0 left-0 right-0 z-20">
        <nav class="container mx-auto px-6 md:px-12 py-4">
            <div class="md:flex justify-center items-center">
                <div class="flex justify-between items-center">
                    <div class="md:hidden">
                        <button class="text-white focus:outline-none">
                            <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    <div class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-32 xl:py-40">
        <div class="w-full flex flex-col items-center relative z-10">
            <h2 class="font-extrabold text-4xl text-center sm:text-6xl text-white leading-tight mt-4">
            Sua solicitação foi enviada com sucesso, logo entramos em contato.
            </h2>
            <a href="https://www.<?php $link?>.crmcorretor.com.br" class="block bg-gray-800 hover:bg-gray-900 py-3 px-4 text-lg text-white font-bold uppercase mt-10 rounded-lg">
                Veja alguns imóveis agora!
            </a>
        </div>
    </div>
</div>


</body>
</html>
