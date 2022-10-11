<?php
namespace Drawapp\Raffling\Model\Domain\DrawItem;

class DrawItemNull extends DrawItem
{
    public function __construct(){
        $this->name = '';
    }
    
}