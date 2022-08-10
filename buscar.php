<?php

  $jogos = array();

  $pesquisa=$_GET["texto"];
  $arquivo=fopen("dados.txt","r") or die("Arquivo nao encontrado!");
  while(!feof($arquivo)){
    $linha=fgets($arquivo);
    $jogo=str_getcsv($linha);
    /*if(in_array($pesquisa,$jogo)){
      array_push($jogos,$linha);
    }*/
    if(strlen($pesquisa) != 0){
      foreach ($jogo as $texto) {
        if(stristr($texto,$pesquisa) != null){
          array_push($jogos,$linha);
        }
      }
    }
  }

?>

<!DOCTYPE html>
<html>
  <?php include 'cabecalho.php';?>
  <body>
      <form method="get">
        <div>
          Pesquisar: <input type="text" name="texto">
        </div>
        <br>
        <div>
          <input type="submit" value="Pesquisar">
        </div>
        <br>
        <div>
          <button><a href="index.php" style="text-decoration: none;">Voltar</a></button>
      </form>
      <br>
      <div>
        <?php
          foreach ($jogos as $jogo) {
            echo "$jogo<br>";
          }
        ?>
      </div>
  </body>
</html>
