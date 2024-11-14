<?php

class Duelo{
    private int $vidaInimigo;
    private int $chanceAcerto;

    

    /**
     * Get the value of vidaInimigo
     */
    public function getVidaInimigo(): int
    {
        return $this->vidaInimigo;
    }

    /**
     * Set the value of vidaInimigo
     */
    public function setVidaInimigo(int $vidaInimigo): self
    {
        $this->vidaInimigo = $vidaInimigo;

        return $this;
    }

    /**
     * Get the value of chanceAcerto
     */
    public function getChanceAcerto(): int
    {
        return $this->chanceAcerto;
    }

    /**
     * Set the value of chanceAcerto
     */
    public function setChanceAcerto(int $chanceAcerto): self
    {
        $this->chanceAcerto = $chanceAcerto;

        return $this;
    }
}