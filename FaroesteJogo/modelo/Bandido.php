<?php
require_once('Personagem.php');

class Bandido extends Personagem {
    private string $apelido;
    private int $nivelProcurado;
    private bool $armaBranca;

    public function recompensa(){
        $recompensa = $this->nivelProcurado*10000;
        return $recompensa;
    }

    

    


    /**
     * Get the value of apelido
     */
    public function getApelido(): string
    {
        return $this->apelido;
    }

    /**
     * Set the value of apelido
     */
    public function setApelido(string $apelido): self
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get the value of nivelProcurado
     */
    public function getNivelProcurado(): int
    {
        return $this->nivelProcurado;
    }

    /**
     * Set the value of nivelProcurado
     */
    public function setNivelProcurado(int $nivelProcurado): self
    {
        $this->nivelProcurado = $nivelProcurado;

        return $this;
    }

    /**
     * Get the value of armaBranca
     */
    public function isArmaBranca(): bool
    {
        return $this->armaBranca;
    }

    /**
     * Set the value of armaBranca
     */
    public function setArmaBranca(bool $armaBranca): self
    {
        $this->armaBranca = $armaBranca;

        return $this;
    }
}