<?php

// Classe com as definicoes do objeto Jogo
// e seus metodos.

class Jogo{

  private $id = 0;
  private $nome;
  private $tipo;
  private $produtora;
  private $ano;

  // Metodo construtor da classe
  function __construct($id,$nome,$tipo,$produtora,$ano){
    $this->id = $id;
    $this->nome = $nome;
    $this->tipo = $tipo;
    $this->produtora = $produtora;
    $this->ano = $ano;
  }

  function getId(){
    return $this->id;
  }

  function getNome(){
    return $this->nome;
  }

  function getTipo(){
    return $this->tipo;
  }

  function getProdutora(){
    return $this->produtora;
  }

  function getAno(){
    return $this->ano;
  }

  function setId($id){
    $this->id = $id;
  }

  function setNome($nome){
    $this->nome = $nome;
  }

  function setTipo($tipo){
    $this->tipo = $tipo;
  }

  function setProdutora($produtora){
    $this->produtora = $produtora;
  }

  function setAno($ano){
    $this->ano = $ano;
  }

  // Metodo para criar um array com as informacoes do Objeto
  // a serem utilizadas.
  function geraArray(){
    $arrayJogo = array();
    array_push($arrayJogo,$this->getId());
    array_push($arrayJogo,$this->getNome());
    array_push($arrayJogo,$this->getTipo());
    array_push($arrayJogo,$this->getProdutora());
    array_push($arrayJogo,$this->getAno());
    return $arrayJogo;
  }

}

?>
