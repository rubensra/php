#!/usr/bin/php

<?php
$arquivo = fopen("jogos.txt","r");
while(!feof($arquivo)){
  $linha = fgets($arquivo);
  echo "Tamanho da linha: ".strlen($linha)."\n";
}
fclose($arquivo);

?>
