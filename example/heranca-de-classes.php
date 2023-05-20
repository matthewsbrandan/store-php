<?php

/**
 * HERANÇA DE CLASSES SERVE PARA QUE CLASSES FILHAS
 * POSSAM HERDAR CARACTERÍSTICAS DE CLASSES SUPERIORES
 * E ASSIM PODER FAZER REUSO DE CÓDIGO
 */
class Animal{
  public function nascer(){}
  public function crescer(){}
  public function morrer(){}
}

// Ele possui todas as características do Animal(classe pai), e pode ter mais
class Cachorro extends Animal{
  public function latir(){}
  public function correr(){}
}
class Peixe extends Animal{
  public function nadar(){}
}

$dog = new Cachorro();
$dog->nascer();
$dog->crescer();
$dog->latir();
$dog->correr();
$dog->morrer();

$fish = new Peixe();
$fish->nascer();
$fish->crescer();
$fish->nadar();
$fish->morrer();