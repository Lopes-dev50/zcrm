







                                       <!----------inicio------>


     <?php
 $url = "https://zimb.com.br/apilistaid/7";
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $resultalistaid = json_decode(curl_exec($ch));
   foreach($resultalistaid as $cli) {








 echo $nome=$cli->cliente;


   }?>






