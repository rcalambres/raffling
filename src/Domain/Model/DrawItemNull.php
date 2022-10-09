<?php
namespace Drawapp\Raffling\Domain\Model;

class DrawItemNull extends DrawItem
{
    public function __construct(){
        $this->name = '';
    }
    
}