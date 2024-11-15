<?php

class Personagem{

    private string $nome;
    private int $vida;
    private string $arma;

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of vida
     */
    public function getVida(): int
    {
        return $this->vida;
    }

    /**
     * Set the value of vida
     */
    public function setVida(int $vida): self
    {
        $this->vida = $vida;

        return $this;
    }

    /**
     * Get the value of arma
     */
    public function getArma(): string
    {
        return $this->arma;
    }

    /**
     * Set the value of arma
     */
    public function setArma(string $arma): self
    {
        $this->arma = $arma;

        return $this;
    }

}

