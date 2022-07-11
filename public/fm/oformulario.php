<?php
$idc= 6;


$urlimg = "https://crmcorretor.com.br/";
$url = "https://crmcorretor.com.br/api/ApiBuscaCorretor/$idc";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($ch));

foreach ($resultado as $corretor) {
    $user_id=$corretor->id;
    $corretor=$corretor->name;
   // $equipe=$corretor->equipe_id;


   }






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
    <img src="imgfor.jpg" class="absolute h-full w-full object-cover"/>
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
            <h1 class="font-extrabold text-7xl text-center sm:text-8xl text-white leading-tight mt-4">
            Minha Casa Minha Vida
            </h1>
            <br>
            <br>
            <p class="text-2xl font-bold text-center text-white"> Cadastro Minha Casa Minha Vida (faixa 1,5 ,2 e 3)</p>
        </div>
    </div>
</div>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!----------inicio------>
                <!----------------------simulacao----------------->

                <form action="https://crmcorretor.com.br/api/ApiNovoLead/<?php echo $user_id?>"  method="post" enctype="multipart/form-data">


<div class="grid xl:grid-cols-3 xl:gap-6">

    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Nome</label>
        <input type="text" id="email" name="nome_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Email</label>
        <input type="email" id="email" name="email_cliente"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Celular</label>
            <input type="text" id="telefone" name="celular_cliente" maxlength="15" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>

    <div class="grid xl:grid-cols-3 xl:gap-6">

    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Cidade</label>
        <input type="text" id="email" name="cidade_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Bairro</label>
        <input type="email" id="email" name="bairro_cliente"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Imóvel até que valor?</label>
            <input type="text" id="valor" size="12" onKeyUp="mascaraMoeda(this, event)" name="celular_cliente" maxlength="15" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>


    <div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="renda_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual a renda bruta de todos compradores?</label>
        <input type="text" id="renda_cliente"  size="12" onKeyUp="mascaraMoeda(this, event)" name="renda_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
    <div class="relative z-0 w-full mb-6 group">
        <label for="fgts_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Tem FGTS? Qual valor aproximado de FGTS?</label>
        <input type="text" id="fgts_cliente" size="12" onKeyUp="mascaraMoeda(this, event)"  name="fgts_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="nascimento_cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Data de nascimento</label>
            <input type="date" id="nascimento_cliente" name="nascimento_cliente" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  value="">
            </div>
    </div>
    <div class="grid xl:grid-cols-3 xl:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <div class="relative z-0 w-full mb-6 group">
                <label for="ctps" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Carteira assinada à mais de 4 meses no emprego atual?</label>
                <select id="ctps" name="ctps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="SIM">SIM</option>
                    <option value="NÃO">NÃO</option>
                </select>
            </div>
            </div>
        <div class="relative z-0 w-full mb-6 group">
                    <label for="escivil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual o seu estado Civil?</label>
                    <select id="escivil" name="escivil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Selecionar">Selecionar</option>
                        <option value="CASADO">CASADO(A)</option>
                        <option value="SOLTERIO">SOLTEIRO(A)</option>
                        <option value="UNIÃO ESTAVEL">UNIÃO ESTAVEL</option>
                        <option value="DIVORCIADO">DIVORCIADO(A)</option>
                    </select>
                </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="dependente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Você tem filhos ou dependentes?</label>
                <select id="dependente" name="dependente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="Selecionar">Selecionar</option>
                    <option value="SIM">SIM</option>
                    <option value="NÃO">NÃO</option>
                </select>
            </div>
        </div>
            <div class="grid xl:grid-cols-3 xl:gap-6">
                </div>
                <div class="grid xl:grid-cols-3 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="imovel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Você tem imóvel no seu nome?</label>
                        <select id="imovel" name="imovel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Selecionar">Selecionar</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="juntar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Pretende comprar sozinho ou vai juntar renda?</label>
                        <select id="juntar" name="juntar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Selecionar">Selecionar</option>
                            <option value="SOZINHO">SOZINHO(A)</option>
                            <option value="JUNTAR RENDA">cônjuge, parente, amigos etc.</option>
                        </select>
                    </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="entrada" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Possui entrada?</label>
                            <select id="entrada" name="entrada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="NÃO">NÃO</option>
                                <option value="SIM">SIM</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid xl:grid-cols-3 xl:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="spc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Algum dos compradores possui restrição financeira?</label>
                            <select id="spc" name="spc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="SIM">SIM</option>
                                <option value="NÃO">NÃO</option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="financiamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Possui financiamento (veiculo, empréstimo bancário)?</label>
                            <select id="financiamento" name="financiamento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Selecionar">Selecionar</option>
                                <option value="SIM">SIM</option>
                                <option value="NÃO">NÃO</option>
                            </select>
                        </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-100 dark:text-gray-500">Como encontrou o site?</label>
                                <select id="countries" name="origem_cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Selecionar">Selecionar</option>
                                    <option value="Indicado">Indicacão</option>
                                    <option value="Anuncio">Anuncio</option>
                                    <option value="FaceBook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Pesquisando">Pesquisando</option>
                                </select>
                            </div>
                        </div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-500">Qual suas dúvidas?</label>
<textarea id="message" name="conversa_cliente" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
   <br>


   <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
   <input type="hidden" name="equipe_id" value="<?php echo $equipe_id ?>">
   <input type="hidden" name="corretor" value="<?php echo $corretor ?>">

   <button type="submit" class="text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">ENVIAR</button>
  </form>
<br>
<br>
<hr>

<script src="../js/meus.js" defer></script>



                   <!-----------fim-------->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
