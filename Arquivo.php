<?php

// Classe Arquivo responsavel pelas operacoes com 
// os arquivos. Abertura, fechamento, leitura e escrita.

  include 'Jogo.php'; // Arquiv que define a classe do Obejto Jogo

  class Arquivo{

    private $arquivo;
    private $index = 0;

    private $meuArquivo = "jogos.txt"; // Arquivo de registro que sera usado.

    // Metodo Contrutor da Classe Arquivo
    function __construct(){
      $this->criarArquivo();
    }

    //Metodo que cria um Arquivo caso o mesmo ainda nao exista.

    function criarArquivo(){
      if(!file_exists($this->meuArquivo)){
        $this->abreArquivo("w");
        fwrite($this->arquivo,"0\n");
        $this->fechaArquivo();
        clearstatcache();
        //echo "Arquivo Criado com sucesso!";
      }
    }

    // Metodo para abertura do arquivo de acordo com o tipo desejado
    // a, r, w, ou a+, r+ ou w+.

    function abreArquivo($tipo){
      $this->arquivo = fopen($this->meuArquivo,$tipo) or die("Não foi possivel abrir o arquivo!");
    }

    // Metodo de fechamento do arquivo aberto
	
    function fechaArquivo(){
      fclose($this->arquivo);
    }

    // Metodo que pega a 1a. linha do arquivo de registros,
    // para saber qntos registros ha no arquivo.
    function pegaIndex(){
      $this->abreArquivo("r+");
      $this->index = (int)fgets($this->arquivo);
      $this->fechaArquivo($this->arquivo);
    }

    //Metodo para atualizar o numero de registros que ja foram inseridos.
    //O valor e sempre incrementado mesmo que algum registro tenha 
    //sido removido, seguindo uma logica parecida com os
    //bancos de dados.
    function atualizaIndex(){
      $this->abreArquivo("r+");
      $this->index += 1;
      fwrite($this->arquivo,$this->index);
      $this->fechaArquivo($this->arquivo);
    }

    // Metodo para gravar um registro no arquivo de registros.
    // Novos registros sao inseridos sempre no fim do arquivo
    // por isso a opcao "a+" em abreArquivo.
    function gravaRegistro($registro){
      $this->pegaIndex($this->meuArquivo);
      $this->abreArquivo("a+");
      $idx = $this->index+1;
      $registro->setId($idx);
      $linha = $registro->getId().",".$registro->getNome().",".$registro->getTipo().",".$registro->getProdutora().",".$registro->getAno()."\n";
      fwrite($this->arquivo,$linha);
      $this->fechaArquivo($this->arquivo);
      $this->atualizaIndex($this->meuArquivo);
      return true;
    }

    // Metodo para retornar / pesquisar um registro no 
    // arquivo de registros.
    function buscaRegistro($pesquisa){
      $jogos = array();
      $this->abreArquivo("r");
      while(!feof($this->arquivo)){
        $linha=fgets($this->arquivo);
        $jogo=str_getcsv($linha);
        if(strlen($pesquisa) != 0){
          foreach ($jogo as $texto) {
            if(stristr($texto,$pesquisa) != null){
              //array_push($jogos,$linha);
              $meuJogo = new Jogo("$jogo[0]","$jogo[1]","$jogo[2]","$jogo[3]","$jogo[4]");
              array_push($jogos,$meuJogo);
            }
          }
        }
      }
      return $jogos;
    }

    /*
      ** Prototipo de funcap para remover registros de arquivo **
    function apagaRegistro($id){
      $posicao = 0;

      $this->abreArquivo("r+");
      fseek($this->arquivo,3);
      $posicao+=3;
      white(!feof($this->arquivo)){
        $linha=fgets($this->arquivo);
        if($id === fgetc($linha)){
          fseek($this->arquivo,$posicao);
          $tamanho = strlen($linha);
          for($i = 0)
        }
      }*/


    //}



  }
?>
