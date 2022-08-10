<?php

  $nome=$_POST["nome"];
  $tipo=$_POST["tipo"];
  $produtora=$_POST["produtora"];
  $ano=$_POST["ano"];
  $index = 0;

  if(file_exists("dados.txt")){
    $arquivo = fopen("dados.txt","r");
    $index = (int)fgets($arquivo);
    fclose($arquivo);
  } else {
    $arquivo = fopen("dados.txt","w");
    fwrite($arquivo,"0");
    fclose($arquivo);
  }


  $jogos = "$nome,$tipo,$produtora,$ano\n";
  $arquivo = fopen("dados.txt","a+");
  fwrite($arquivo,$jogos);
  fclose($arquivo);

  $arquivo=fopen("dados.txt","r+");
  $index+=1;
  fwrite($arquivo,$index);
  fclose($arquivo);

 echo "Gravaçao realizada com sucesso!";

?>

<!DOCTYPE html>
<html>
  <body>
    <a href="Cadastro.html">Voltar</a>
  </body>
</html>
