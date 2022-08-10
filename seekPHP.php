#!/usr/bin/php

<?php 

  $arquivo = fopen("jogos.txt","r");
  fseek($arquivo,135);
  $jogo = fgets($arquivo);
  print_r($jogo);
  fclose($arquivo);

?>
