<?php


  include 'Arquivo.php';
  $titulo;

  session_start();
  if($_SESSION["tipo"] === "cadastro"){
    $titulo = "Cadastro";
    $nome="";
    $tipo="";
    $produtora="";
    $ano="";
  } else {
    $arquivo = new Arquivo();
    $pesquisa = $_GET["id"];
    $jogos = $arquivo->buscaRegistro($pesquisa);
    $titulo = "Atualização";
    $id = $jogos[0]->getId();
    $nome = $jogos[0]->getNome();
    $tipo = $jogos[0]->getTipo();
    $produtora = $jogos[0]->getProdutora();
    $ano = $jogos[0]->getAno();
    echo "Nome do JOgo: ".$nome;
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo "$titulo"; ?> de Jogos em PHP</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <h2><?php echo "$titulo"; ?> de Jogo</h2>
  <br>
  <form action="Gravar.php" method="post">
    <div>
      Nome: <input type="text" name="nome" value="<?php echo "$nome"; ?>" ><br>
    </div>
    <br>
    <div>
      Tipo: <input type="text" name="tipo" value="<?php echo "$tipo"; ?>" ><br>
    </div>
    <br>
    <div>
      Produtora: <input type="text" name="produtora" value="<?php echo "$produtora"; ?>" ><br>
    </div>
    <br>
    <div>
      Ano: <input type="text" maxlength="4" size="4" name="ano" value="<?php echo "$ano"; ?>" ><br>
    </div>
    <br>
    <div>
      <?php
        if($_SESSION["tipo"] === "cadastro"){
          echo "<input type=\"submit\" value=\"Cadastrar\">";
        } else {
          echo "<input type=\"submit\" value=\"Alterar\">";
        }
      ?>
    </div>
    <br>
    <div>
      <button><a href="index.php" style="text-decoration: none;">Voltar</a></button>
    </div>
  </form>
</body>
</html>
