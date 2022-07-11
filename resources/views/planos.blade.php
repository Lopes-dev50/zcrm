<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                    <div class="flex flex-row">
                    <div class="mx-auto">
                         <p class="p-4 font-sans font-light text-3xl text-gray-500">Escolha seu plano!</p></div>
                   </div>
                   <br>
                   <br>
                   @can('free')
                   <!----------free--------------------------->
                   <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 p-4">
                    <div class="pricing-box max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
                        <div class="bg-white dark:bg-gray-800 px-6 py-8 lg:flex-shrink-1 lg:p-12">
                            <h3 class="text-2xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9 dark:text-white">
                                Zero Investimento
                            </h3>
                            <p class="mt-6 text-base leading-6 text-gray-500 dark:text-gray-200">
                               Já começou com zero investimento agora já pode mudar de plano para ter acesso, a todas ferramentas disponiveis e as futuras.
                            </p>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <h4 class="flex-shrink-0 pr-4 bg-white dark:bg-gray-800 text-sm leading-5 tracking-wider font-semibold uppercase text-indigo-600">
                                        Incluido no plano
                                    </h4>
                                    <div class="flex-1 border-t-2 border-gray-200">
                                    </div>
                                </div>
                                <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Cadastro limitado de clientes
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Funil de vendas
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Agenda de tarefas
                                        </p>
                                    </li>

                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Gerenciado de call
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Estatistica
                                        </p>
                                    </li>

                                </ul>
                            </div>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <h4 class="flex-shrink-0 pr-4 bg-white text-sm dark:bg-gray-800 leading-5 tracking-wider font-semibold uppercase text-indigo-600">
                                       Não incluido no plano
                                    </h4>
                                </div>
                                <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Pagina de captura leads
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Cadastro ilimitado de imóveis
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Markting Envio email automaticos
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Site padrão (seunome.crmcorretor.com.br)
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Relatorio em excel
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Cliente x Imovel (Tinder)
                                        </p>
                                    </li>

                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="h-6 w-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Suporte<span>24/7
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="py-8 px-6 text-center bg-gray-50 dark:bg-gray-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                            <p class="text-lg leading-6 font-bold text-gray-900 dark:text-white">
                                Free
                            </p>
                            <div class="mt-4 flex items-center justify-center text-5xl leading-none font-extrabold text-gray-900 dark:text-white">
                                <span>
                                    R$0,00
                                </span>
                            </div>
                            <p class="mt-4 text-sm leading-5">

                            </p>
                            <div class="mt-6">
                                <div class="rounded-md shadow">

                                    <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                        PLANO ATUAL
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <!--------------free fim --------------------->
                 <!------------------Plano-Corretor---------------------------------->
                 <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 p-4">
                    <div class="pricing-box max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
                        <div class="bg-white dark:bg-gray-800 px-6 py-8 lg:flex-shrink-1 lg:p-12">
                            <h3 class="text-2xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9 dark:text-white">
                                Baixo investimento
                            </h3>
                            <p class="mt-6 text-base leading-6 text-gray-500 dark:text-gray-200">
                                Comece agora mesmo a gerenciar seus clientes, cadastrar seus imóveis criar seu site, organizar sua agenda captar novos leads.
                            </p>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <h4 class="flex-shrink-0 pr-4 bg-white dark:bg-gray-800 text-sm leading-5 tracking-wider font-semibold uppercase text-indigo-600">
                                        Incluido no plano
                                    </h4>
                                    <div class="flex-1 border-t-2 border-gray-200">
                                    </div>
                                </div>
                                <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Cadastro ilimitado de clientes
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Funil de vendas
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Agenda de tarefas
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Markting envio de email automaticos
                                        </p>
                                    </li>

                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Gerenciado de call
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Estatistica
                                        </p>
                                    </li>

                                </ul>
                            </div>
                            <div class="mt-8">

                                <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Pagina de captura leads
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Cadastro ilimitado de imóveis
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Site padrão (seunome.crmcorretor.com.br)
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Relatorio em excel
                                        </p>
                                    </li>
                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Tinder (Clientes X Imovel)
                                        </p>
                                    </li>

                                    <li class="flex items-start lg:col-span-1">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                            Suporte<span>24/7
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="py-8 px-6 text-center bg-gray-50 dark:bg-gray-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                            <p class="text-lg leading-6 font-bold text-gray-900 dark:text-white">
                                CORRETOR
                            </p>
                            <div class="mt-4 flex items-center justify-center text-5xl leading-none font-extrabold text-gray-900 dark:text-white">
                                <span>

                                    <span>
                                        R$37,00
                                    </span>
                                </span>
                            </div>
                            <p class="mt-4 text-sm leading-5">
                                <span class="block font-medium text-gray-500 dark:text-gray-400">
                                    Mensal
                                </span>
                                <span class=" inline-block font-medium text-gray-500 dark:text-gray-400">
                                    Pagamento com cartão ou PIX
                                </span>
                            </p>
                            </p>
                            <div class="mt-6">
                                <div class="rounded-md shadow">
                                    <a href="{{ route('pgcorretor')}}">
                                        <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                           CONTRATAR
                                        </button>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------------------------------------->
                     <!------------------Plano-Gerente---------------------------------->
                     <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 p-4">
                        <div class="pricing-box max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
                            <div class="bg-white dark:bg-gray-800 px-6 py-8 lg:flex-shrink-1 lg:p-12">
                                <h3 class="text-2xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9 dark:text-white">
                                    Baixo investimento
                                </h3>
                                <p class="mt-6 text-base leading-6 text-gray-500 dark:text-gray-200">
                                    Comece agora mesmo a gerenciar sua equipe, companhar evolução de cada corretor enviar leads para os corretores.
                                </p>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <h4 class="flex-shrink-0 pr-4 bg-white dark:bg-gray-800 text-sm leading-5 tracking-wider font-semibold uppercase text-indigo-600">
                                            Incluido no plano
                                        </h4>
                                        <div class="flex-1 border-t-2 border-gray-200">
                                        </div>
                                    </div>
                                    <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Um gerente
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Cadastro até 15 corretores
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Corretores recebem plano CORRETOR
                                            </p>
                                        </li>

                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Funil de vendas da equipe
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Envio de leads para corretor
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mt-8">

                                    <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Estatistica da equipe
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Suporte<span>24/7
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="py-8 px-6 text-center bg-gray-50 dark:bg-gray-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                                <p class="text-lg leading-6 font-bold text-gray-900 dark:text-white">
                                   GERENTE
                                </p>
                                <div class="mt-4 flex items-center justify-center text-5xl leading-none font-extrabold text-gray-900 dark:text-white">
                                    <span>

                                      R$240,00
                                    </span>
                                </div>
                                <p class="mt-4 text-sm leading-5">
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">
                                        Mensal
                                    </span>
                                    <span class=" inline-block font-medium text-gray-500 dark:text-gray-400">
                                       Pagamento com cartão ou PIX
                                    </span>
                                </p>
                                </p>
                                <div class="mt-6">
                                    <div class="rounded-md shadow">
                                        <a href="{{ route('pggerente')}}">
                                        <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                          CONTRATAR
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    <!--------------------------------------------------------------->
                    @can('corretor')
                          <!------------------Plano-Gerente---------------------------------->

                     <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 p-4">
                        <div class="pricing-box max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
                            <div class="bg-white dark:bg-gray-800 px-6 py-8 lg:flex-shrink-1 lg:p-12">
                                <h3 class="text-2xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9 dark:text-white">
                                    Baixo investimento
                                </h3>
                                <p class="mt-6 text-base leading-6 text-gray-500 dark:text-gray-200">
                                    Comece agora mesmo a gerenciar sua equipe, companhar evolução de cada corretor enviar leads para os corretores.
                                </p>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <h4 class="flex-shrink-0 pr-4 bg-white dark:bg-gray-800 text-sm leading-5 tracking-wider font-semibold uppercase text-indigo-600">
                                            Incluido no plano
                                        </h4>
                                        <div class="flex-1 border-t-2 border-gray-200">
                                        </div>
                                    </div>
                                    <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Um gerente
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Cadastro até 15 corretores
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Corretores recebem plano CORRETOR
                                            </p>
                                        </li>

                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Funil de vendas da equipe
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Envio de leads para corretor
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                                <div class="mt-8">

                                    <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Estatistica da equipe
                                            </p>
                                        </li>
                                        <li class="flex items-start lg:col-span-1">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                                Suporte<span>24/7
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="py-8 px-6 text-center bg-gray-50 dark:bg-gray-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                                <p class="text-lg leading-6 font-bold text-gray-900 dark:text-white">
                                   GERENTE
                                </p>
                                <div class="mt-4 flex items-center justify-center text-5xl leading-none font-extrabold text-gray-900 dark:text-white">
                                    <span>

                                      R$240,00
                                    </span>
                                </div>
                                <p class="mt-4 text-sm leading-5">
                                    <span class="block font-medium text-gray-500 dark:text-gray-400">
                                        Mensal
                                    </span>
                                    <span class=" inline-block font-medium text-gray-500 dark:text-gray-400">
                                       Pagamento com cartão ou PIX
                                    </span>
                                </p>
                                </p>
                                <div class="mt-6">
                                    <div class="rounded-md shadow">
                                        <a href="{{ route('pggerente')}}">
                                        <button type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                          CONTRATAR
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
<br>
<br>
<br>
                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
