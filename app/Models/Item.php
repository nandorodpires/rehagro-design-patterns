<?php

namespace App\Models;

class Item {
    protected string $name;
    protected float $value;

    public function setName(string $name) {
        $this->name = $name;
    }  

    public function setValue(float $value) {
        $this->value = $value;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getValue() : float {
        return $this->value;
    }
}