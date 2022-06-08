<?php
namespace Sorteando\Draw\Domain\Model;

class DrawItemNull extends DrawItem
{
    public function __construct(){
        $this->name = '';
    }
    
}