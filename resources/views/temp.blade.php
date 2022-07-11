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
    <body class="antialiased">

            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5  dark:bg-gray-800">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                  <a href="https://www.crmcorretor.com.br/" class="flex items-center">
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
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logar</a>
                            </li>
                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrar</a>
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
              <div class=" relative  h-screen py-5 mx-8">
              <!--------inicio---->
              <p class="pt-4 text-justify">

