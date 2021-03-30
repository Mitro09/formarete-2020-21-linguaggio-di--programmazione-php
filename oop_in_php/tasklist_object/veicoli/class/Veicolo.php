<?php
/**
 * @var int npasseggeri numero di persone max
 */

class Veicolo {
    private $npasseggeri;
    private $motore;
    private $serbatoio;
    private $carburante;
    private $posizione = 0;

    public function __construct($motore,$serbatoio,$npasseggeri){
        $this->carburante = 0;
        $this->serbatoio = $serbatoio;
        $this->npasseggeri = $npasseggeri;
        $this->motore = $motore;
    }

    public function sposta(float $spostamento){
        if($this->carburante - $spostamento >= 0){
            $this->posizione += $spostamento;
            $this->carburante -= $spostamento;
        }
        else{
            return new Exception("Carburante non sufficiente");
        }
        return  $this->posizione;
    }

    //SetCarburante
    public function rifornimento(float $carburante){
        if($this->serbatoio < ($this->carburante + $carburante)){
            return new Exception("Troppa Benza");
        }
        else{
            $this->carburante += $carburante;
        }
    }

    public function getSerbatoio():float{
        return $this->serbatoio;
    }

    public function getPasseggeri():int{
        return $this->npasseggeri;
    }

    public function setMotore($motore){
        $this->mototre = $motore;
    }

    public function getMotore(){
        return $this->motore;
    }

}