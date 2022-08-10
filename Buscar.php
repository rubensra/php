<?php

  session_start();
  include 'Arquivo.php';

  $arquivo = new Arquivo();
  $pesquisa = $_GET["texto"];

  $jogos = $arquivo->buscaRegistro($pesquisa);

  function listagem($jogos){
    $_SESSION["tipo"] = "editar";
    echo "<ul>";
    foreach ($jogos as $jogo) {
      echo "<li>";
      echo $jogo->getNome()." - ".$jogo->getTipo()." - ".$jogo->getProdutora()." - ".$jogo->getAno();
      echo "\t<button><a href=\"Cadastro.php?id=".$jogo->getId()."\">Editar</a></button>";
      echo "</li><br>";
    }
    echo "</ul>";
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
          listagem($jogos);
        ?>
      </div>
  </body>
</html>
