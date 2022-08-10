<?php

  include 'Arquivo.php';
  include 'Jogo.php';

  $arquivo = new Arquivo();

  //$arquivo->criarArquivo();

  $meuJogo = new Jogo(0,$_POST["nome"],$_POST["tipo"],$_POST["produtora"],$_POST["ano"]);

  if($arquivo->gravaRegistro($meuJogo)){
    echo "Registro gravado com sucesso!";
  }
?>
<!DOCTYPE html>
<html>
  <body>
    <div>
      <a href="Cadastro.php">Voltar</a>
    </div>
    <br>
    <div>
      <a href="index.php">Principal</a>
    </div>
    <br>
  </body>
</html>
