<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRM CORRETOR</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </head>
    <body class="antialiased dark:bg-gray-800">

            <nav class="bg-gray-900 border-gray-200 px-2 sm:px-4 py-2.5  ">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                  <a href="https://crmcorretor.com.br/" class="flex items-center">
                      <img src="{{ asset("imgSite/logo_crm.png") }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">CrmCorretor</span>
                  </a>
                  <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                  <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                          <li>
                        @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            </li>
                                @else
                            <li>
                                <a href="{{ route('login') }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logar</a>
                            </li>
                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</a>

                                </li>
                                    @endif
                            @endauth
                        </div>
                    @endif
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              <!--------inicio---->
             <!----------------------planos inicio------------------->
             <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center">
                <div class="container mx-auto px-6 flex flex-col justify-between items-center relative py-8">
                    <div class="flex flex-col">
                        <h1 class="font-light w-full uppercase text-center text-4xl sm:text-5xl dark:text-white text-gray-800">
                            Uma ferramenta para Corretor! Autonômo.
                        </h1>
                        <h2 class="font-light max-w-2xl mx-auto w-full text-xl dark:text-white text-gray-500 text-center py-8">
                            Uma Plataforma completa. Vender imóveis é uma tarefa que requer cada vez mais preparo; Para dar conta de tanto trabalho, é indispensável adotar um software, um sistema seguro, pensado e desenvolvido por Corretores para Corretores de imóveis. Na automatização das operações do seu negócio. tando para gerenciar seus clientes e seus imóveis. Com o Crm Corretor fica muito facil.

                        </h2>
                        <div class="flex items-center justify-center ">
                            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModals">
                               VEJA O VÍDEO!
                              </button>
                              <br>
                        </div>
                    </div>
                    <div class="block w-full mx-auto mt-6 pt-6 md:mt-0 relative">
                        <img src="{{ asset("imgSite/hero-banner.png") }}" class="max-w-xs md:max-w-2xl m-auto"/>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <!----------------------parte dois inicio----------------->
            <div class="bg-white dark:bg-gray-800 overflow-hidden relative pt-8 mx-8">
                <div class="text-start w-1/2 py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
                    <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
                        <span class="block">
                            Tem apricatico para celular ?
                        </span>
                        <span class="block text-indigo-500">
                            Esta em desenvolvendo.
                        </span>
                    </h2>
                    <p class="text-xl mt-4 text-gray-400">
                       Temos uma versão do site para acesso por computador e outra adapitada para acesso por celular.
                    </p>
                    <div class="lg:mt-0 lg:flex-shrink-0">
                        <div class="mt-12 inline-flex rounded-md shadow">

                        </div>
                    </div>
                </div>
                <img src="{{ asset("imgSite/offer2.png") }}" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0"/>
            </div>
            <!---------------------parte dois fim ------------------->
            <br>
            <hr>
            <br>
            <!--------------------parte3----------------------------->
            <div class="relative bg-white dark:bg-gray-800 p-4 mx-8">
                <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-12 lg:items-center">
                    <div class="lg:col-start-2 md:pl-20">
                        <h4 class="text-2xl leading-8 font-extrabold text-gray-900 dark:text-white tracking-tight sm:leading-9">
                           Algumas ferramentas:
                        </h4>
                        <ul class="mt-10">
                            <li>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                               Site Padrão
                                        </h5>
                                        <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                                            Com seu site além de divulgar seus imóveis, ainda tem a pagina de captura de leads, Link direto para whatsapp, formulario agendamento assim que o cliente preenche este formulario é encaminhado para seu email e cadastrato no sistema.

                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                          Pagina de captura
                                        </h5>
                                        <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                                            Muitas vezes quando o corretor faz algum anuncio no facebook, ele acaba tendo dificuldade na hora criar um formulario, para captação de leads, no crm muito simples ele gera link onde já vai ter um formulário completo. melhor de tudo, envia email para visar a cada novo cadastro, e já cadastra no sistema.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                            <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                            Markting ativo.
                                        </h5>
                                        <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                                            O Crm envia email automaticamente para os clientes parados a partir dos 35 dias, com chamas diferentes em cada e-mail.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 -mx-4 md:-mx-12 relative lg:mt-0 lg:col-start-1">
                        <img src="{{ asset("imgSite/offer.png") }}" alt="illustration" class="relative mx-auto shadow-lg rounded w-auto"/>
                    </div>
                </div>
            </div>
            <!------------------------parte fim 3 ------------------->
            <br>
            <hr>

            <br>
            <!------------inicio detalhes sistema-------------------->
            <div class="max-w-screen-xl p-4 bg-white dark:bg-gray-800 mx-auto px-4 sm:px-6 lg:px-8 relative py-26 lg:mt-20">
                <div class="relative">
                    <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div class="lg:col-start-2 lg:max-w-2xl ml-auto">
                            <p class="text-base leading-6 text-indigo-500 font-semibold uppercase">
                                Interatividade
                            </p>
                            <h4 class="mt-2 text-2xl leading-8 font-extrabold text-gray-900 dark:text-white sm:text-3xl sm:leading-9">
                                Conta com funil de vendas, gerenciamento de Imóveis.
                            </h4>
                            <p class="mt-4 text-lg leading-6 text-gray-500 dark:text-gray-300">
                               Tem outras ferramentas para que possa aumentar suas vendas, ajudando gerenciar seus clientes, automatizando processos.
                            </p>
                            <ul class="mt-8 md:grid md:grid-cols-2 gap-6">
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            Call
                                        </span>
                                    </div>
                                </li>
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            Tinder
                                        </span>
                                    </div>
                                </li>
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            Estatisticas
                                        </span>
                                    </div>
                                </li>
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            Filtros
                                        </span>
                                    </div>
                                </li>
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            Agenda
                                        </span>
                                    </div>
                                </li>
                                <li class="mt-6 lg:mt-0">
                                    <div class="flex">
                                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-green-100 text-green-800 dark:text-green-500 drark:bg-transparent">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-base leading-6 font-medium text-gray-500 dark:text-gray-200">
                                            E-mail markting
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 lg:-mx-4 relative relative-20 lg:mt-0 lg:col-start-1">
                            <div class="relative space-y-4">
                                <div class="flex items-end justify-center lg:justify-start space-x-4">
                                    <img class="rounded-lg shadow-lg w-32 md:w-56" width="200" src="{{ asset("imgSite/w1.png") }}" alt="1"/>
                                    <img class="rounded-lg shadow-lg w-40 md:w-64" width="260" src="{{ asset("imgSite/w2.png") }}" alt="2"/>
                                </div>
                                <div class="flex items-start justify-center lg:justify-start space-x-4 ml-12">
                                    <img class="rounded-lg shadow-lg w-24 md:w-40" width="170" src="{{ asset("imgSite/w3.png") }}" alt="3"/>
                                    <img class="rounded-lg shadow-lg w-32 md:w-56" width="200" src="{{ asset("imgSite/w4.png") }}" alt="4"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------fim do detalhe---------------------------->
            <br>

            <hr>
            <br>
             <!-----------------------inicio fim--------------------->
             <div class="pricing-table-2 bg-gray-800 py-6 md:py-12">
                <div class="container mx-auto px-4">

                  <div class="max-w-3xl mx-auto text-center">
                    <h1 class="text-3xl md:text-4xl font-medium text-white mb-4 md:mb-6">Começe hoje mesmo!</h1>
                    <p class="text-gray-400 xl:mx-12">Tem um plano gratuito para que possa começar hoje a usar sistema gerenciar seus clientes. Esta é uma otima ferramenta.</p>
                  </div>
                  <div class="pricing-plans lg:flex lg:-mx-4 mt-6 md:mt-12">
                    <div class="pricing-plan-wrap lg:w-1/3 my-4 md:my-6">
                      <div class="pricing-plan border-t-4 border-solid border-white bg-white text-center max-w-sm mx-auto hover:border-indigo-600 transition-colors duration-300">
                        <div class="p-6 md:py-8">
                          <h4 class="font-medium leading-tight text-2xl mb-2">Plano FREE</h4>
                          <p class="text-gray-600">Primeiros passos.</p>
                        </div>
                        <div class="pricing-amount bg-indigo-100 p-6 transition-colors duration-300">
                          <div class=""><span class="text-4xl font-semibold">R$00</span> </div>
                        </div>
                        <div class="p-6">
                          <ul class="leading-loose">
                            <li> Cadastro limitado de clientes</li>
                            <li>Funil de vendas</li>
                            <li>Agenda de tarefas</li>

                            <li>Gerenciador de call</li>
                            <li>Estatistica</li>
                            <li class="text-gray-300">Cadastro ilimitado de imóveis</li>
                            <li class="text-gray-300">Envio de e-mail automatico</li>
                            <li class="text-gray-300"> Pagina de captura leads</li>
                            <li class="text-gray-300"> Site padrão (seunome.crmcorretor.com.br)</li>
                            <li class="text-gray-300"> Tinder (Clientes X Imovel)</li>
                            <li class="text-gray-300">  Suporte<span>24/7</li>
                          </ul>
                          <div class="mt-6 py-4">
                            <a href="{{ route('register') }}">
                            <button class="bg-indigo-600 text-xl text-white py-2 px-6 rounded hover:bg-indigo-700 transition-colors duration-300">INICIAR AGORA!</button>
                            </a>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-plan-wrap lg:w-1/3 my-4 md:my-6">
                      <div class="pricing-plan border-t-4 border-solid border-white bg-white text-center max-w-sm mx-auto hover:border-indigo-600 transition-colors duration-300">
                        <div class="p-6 md:py-8">
                          <h4 class="font-medium leading-tight text-2xl mb-2">Plano CORRETOR</h4>
                          <p class="text-gray-600">Pisando fundo!</p>
                        </div>
                        <div class="pricing-amount bg-indigo-100 p-6 transition-colors duration-300">
                          <div><span class="text-4xl font-semibold">R$ 37</span> /mensal</div>
                        </div>
                        <div class="p-6">
                          <ul class="leading-loose">
                            <li> Cadastro ilimitado de clientes</li>
                            <li>Funil de vendas</li>
                            <li>Agenda de tarefas</li>
                            <li>Gerenciador de call</li>
                            <li>Estatistica</li>
                            <li>Cadastro ilimitado de imóveis</li>
                            <li>Envio de e-mail automatico</li>
                            <li> Pagina de captura leads</li>
                            <li> Site padrão (seunome.crmcorretor.com.br)</li>
                            <li> Tinder (Clientes X Imovel)</li>
                            <li>  Suporte<span>24/7</li>
                          </ul>
                          <div class="mt-6 py-4">
                            <button class="bg-indigo-600 text-xl text-white py-2 px-6 rounded hover:bg-indigo-700 transition-colors duration-300">INICIAR AGORA</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-plan-wrap lg:w-1/3 my-4 md:my-6">
                      <div class="pricing-plan border-t-4 border-solid border-white bg-white text-center max-w-sm mx-auto hover:border-indigo-600 transition-colors duration-300">
                        <div class="p-6 md:py-8">
                          <h4 class="font-medium leading-tight text-2xl mb-2">Plano GERENTE</h4>
                          <p class="text-gray-600">Gerenciando vencedores!</p>
                        </div>
                        <div class="pricing-amount bg-indigo-100 p-6 transition-colors duration-300">
                          <div class=""><span class="text-4xl font-semibold">R$ 240</span> /mensal</div>
                        </div>
                        <div class="p-6">
                          <ul class="leading-loose">
                            <li> Um gerente</li>
                            <li>Cadastro até 15 corretores</li>
                            <li>Corretores recebem plano CORRETOR</li>
                            <li>Funil de vendas da equipe</li>
                            <li> Envio de leads para corretor</li>
                            <li>  Suporte<span>24/7</li>
                            <li class="text-gray-100"> -------</li>
                            <li class="text-gray-100"> -------</li>
                            <li class="text-gray-100"> -------</li>
                            <li class="text-gray-100"> -------</li>
                            <li class="text-gray-100"> -------</li>
                          </ul>
                          <div class="mt-6 py-4">
                            <button class="bg-indigo-600 text-xl text-white py-2 px-6 rounded hover:bg-indigo-700 transition-colors duration-300">INICIAR AGORA</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <!------------------------------------>
                <br>
                <hr>
                <div class="relative bg-white dark:bg-gray-800 p-4 mx-8">
                    <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-12 lg:items-center">
                        <div class="lg:col-start-2 md:pl-20">
                            <h4 class="text-2xl leading-8 font-extrabold text-gray-900 dark:text-white tracking-tight sm:leading-9">
                               Gerente:

                            </h4>
                            <br>
                            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                             Veja o funcionamento do sistema
                           </button>
                            <ul class="mt-10">
                                <li>
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                                <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                   Equipe
                                            </h5>
                                            <p class="mt-2 pt-4 text-base leading-6 text-gray-500 dark:text-gray-300">
                                                Uma plataforma exclúsiva para gerenciamento de equipe, onde o gerente pode cadastrar seus corretores e assim acompanhar andamento da equipe.


                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-10">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                                <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                              Controle Geral
                                            </h5>
                                            <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                                                Gerencie quantos clientes foram cadastrados diariamente, mensalmente e anuamente.
                                                Acesso as conversa registradas por cada corretor sobre seus clientes, envio de leads para os corretores.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-10">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                                                <svg width="20" height="20" fill="currentColor" class="h-6 w-6" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="text-lg leading-6 text-gray-900 dark:text-white font-bold">
                                               Grafico e Funil por corretor.
                                            </h5>
                                            <p class="mt-2 text-base leading-6 text-gray-500 dark:text-gray-300">
                                                Acompanhe o andamento de cada corretor, por meio de graficos, tenha visão geral.
                                            </p>
                                        </div>
                                       </div>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-10 -mx-4 md:-mx-12 relative lg:mt-0 lg:col-start-1">
                            <img src="{{ asset("imgSite/offer.png") }}" alt="illustration" class="relative mx-auto shadow-lg rounded w-auto"/>
                        </div>
                    </div>
                </div>
                <br>
                <!------------quemsomos---------------->
                <br>
                <hr>
                <div class="bg-white dark:bg-gray-800 ">
                    <div class="text-center w-full mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
                        <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
                            <span class="block">
                                Quem Somos ?
                            </span>
                            <span class="block text-indigo-500">
                                Conquistando o mercado imobiliário.
                            </span>
                        </h2>
                        <p class="text-xl mt-4  mx-auto text-gray-400">
                            O encontro de dois amigos, que juntanto a experiencia de muitos anos no mercado da corretagem, passando a usar gerenciadores fornecido nas imobiliárias, nasce idéia de criar um sistema que atenda a necessidade do corretor, de captar, gerenciar seus clientes e vender seus imóveis

                            Ouvindo e trocando idéias com outros corretores sistema simples e poderoso.
                            Somos uma empresa nova nascemos dia 12/08/2019 e com poucos meses no mercado, já estamos conquistando a confinaça dos corretores, ajudando a captar novos leads e gerenciar seus clientes e vender mais imóveis. Seja bem vindo ao Crm Corretor
                        </p>
                        <div class="lg:mt-0 lg:flex-shrink-0">
                            <div class="mt-12 inline-flex rounded-md shadow">

                            </div>
                        </div>
                    </div>
                </div>
                <!------------fim do quemsomos--------->
                <!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   Pause o vídeo antes de fechar.
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
                            <div
                              class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden  mx-8"
                              style="padding-top: 6.25%">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/i4rIxJ3S-WU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <br>
                            <br>



        </div>
    </div>
</div>
<!-- Modal footer -->

   <!-- Main modal -->
   <div id="defaultModals" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                   Pause o vídeo antes de fechar.
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModals">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
                            <div
                              class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden  mx-8"
                              style="padding-top: 6.25%">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/RSzjntfJQ2I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <br>
                            <br>



        </div>
    </div>
</div>
<!-- Modal footer -->
                <!-----------fim-------->
              </div>
              <footer class="p-4 bg-white  shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-900">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://crmcorretor.com.br/" class="hover:underline">CrmCorretor™</a>. All Rights Reserved.
                </span>
                <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">

                    <li>
                        <a href="{{ url('/privacidade') }}" class="mr-4 hover:underline md:mr-6">Politica de privacidade</a>
                    </li>
                    <li>
                        <a href="{{ url('/termo') }}" class="mr-4 hover:underline md:mr-6">Termo uso</a>
                    </li>

                </ul>
            </footer>
    </body>
</html>
