#!/usr/bin/php

<?php

  $arquivo = fopen("testeJogos.txt","r+") or die("Nao foi possivel abrir o arquivo");
  fseek($arquivo,2);
  $posicao = 2;
  $ponteiro = 0;
  $id = "3";
  while(!feof($arquivo)){

     $linha = fgets($arquivo);
     $jogo = str_getcsv($linha);
     if(strcmp($id,$jogo[0]) === 0){
	//$texto = " ";
	//fseek($arquivo,$posicao);
	//fwrite($arquivo,$texto);
        echo "Posicao: $posicao\n";
	$ponteiro = $posicao;
	break;
	//fclose($arquivo);
	//echo "Registro removido";
     } else {
	//print_r($jogo);
	$posicao += strlen($linha);
        echo "Nova Posicao: $posicao, primeiro caractere: ".$jogo[0]."\n";
     }
  }
  
  fseek($arquivo,$ponteiro);
  //$registro = fgets($arquivo);
  //echo "Meu registro: $registro";
  fwrite($arquivo," ");
  echo "Arquivo Alterado\n";
  fclose($arquivo);

?>
