<?php
require_once('Personagem.php');

class Procurador extends Personagem {
    private int $honra;
    private bool $rifle;

    


    /**
     * Get the value of honra
     */
    public function getHonra(): int
    {
        return $this->honra;
    }

    /**
     * Set the value of honra
     */
    public function setHonra(int $honra): self
    {
        $this->honra = $honra;

        return $this;
    }

    /**
     * Get the value of rifle
     */
    public function isRifle(): bool
    {
        return $this->rifle;
    }

    /**
     * Set the value of rifle
     */
    public function setRifle(bool $rifle): self
    {
        $this->rifle = $rifle;

        return $this;
    }
}


