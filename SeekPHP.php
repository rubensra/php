#!/usr/bin/php

<?php

  $arquivo = fopen("testeJogos.txt","r+");
  fseek($arquivo,2);
  $id = "4";
  while(!feof($arquivo)){

    $linha = fgets($arquivo);
    /*$jogo = str_getcsv($linha);
    if(strcmp($id,$jogo[0]) === 0){
        echo "Jogo encontrado: ";
        print_r($jogo);
    }*/
    echo $linha;
  }

  fclose($arquivo);

?>
