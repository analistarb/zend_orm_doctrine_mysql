<?php

/**
 * Carro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Carro extends BaseCarro {

    public function setIdcarro($idcarro) {
        $this->idcarro = $idcarro;
    }

    public function getIdcarro() {
        return $this->idcarro;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function inserirCarro() {
        try {
            $this->save();
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

    public function pesquisaCarros() {
        try {
            $rs = $this->getTable("carro")->findAll();
            return $rs;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

    public function excluirCarro() {
        try {
            $carro = $this->getTable("carro")->find($this->getIdcarro());
            if ($carro) {
                $carro->delete();
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

    public function pesquisaCarroById() {
        try {
            return $this->getTable("carro")->find($this->getIdcarro());
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

    public function atualizaCarro() {
        try {
            $carro = $this->getTable("carro")->find($this->getIdcarro());
            if ($carro) {
                $carro->nome = $this->getNome();
                $carro->marca = $this->getMarca();
                $carro->save();
                return true;
            } 
            else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}