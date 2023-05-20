<?php

/**
 * CLASSE É COMO SE FOSSE A PLANTA DE UM CASA, UMA DESCRIÇÃO DE COMO É O FUNCIONAMENTO
 * DE QUAIS CARACTERISTICAS POSSUI, MAS EXISTE APENAS DE FORMA ABSTRATA
 **/
class Home{
  // ATRIBUTOS SÃO CARACTERISTICAS DE UMA CLASSE
  public $numberOfBedrooms;

  // MÉTODO CONSTRUTOR É CHAMADO NA CRIAÇÃO DE UM OBJETO
  public function __construct($numberOfBedrooms){
    $this->numberOfBedrooms = $numberOfBedrooms;
  }

  // MÉTODOS (OU FUNÇÕES) SÃO AÇÕES QUE ESSA CLASSE PODE EXECUTAR
  public function openDoor(){
    echo $this->numberOfBedrooms . " portas abertas";
  }
  public function turnOnLight(){
    echo $this->numberOfBedrooms . " luzes acesas";
  }

  // MÉTODOS ESTÁTICOS NÃO DEPENDEM DA CRIAÇÃO DE UMA CLASSE
  public static function getPlant(){
    echo "A casa terá uma quantidade N de quartos, e poderá abrir a porta e acender a luz desses comodos";
  }
}


/**
 * CRIAÇÃO DE OBJETO. O OBJETO TORNA CONCRETO A DEFINIÇÃO DE UM CLASSE
 * OU SEJA, SERIA TORNA COMO TORNAR PLANTA DE UMA CASA, UM CASA DE VERDADE
 */
$homeWith3Bedroom = new Home(3);
$homeWith4Bedroom = new Home(4);

$homeWith3Bedroom->openDoor();
echo "<br/><hr/>";
$homeWith4Bedroom->turnOnLight();
echo "<br/><hr/>";
Home::getPlant();