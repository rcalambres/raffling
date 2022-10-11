<?php
namespace Drawapp\Raffling\Model\Domain\DrawItem;

use Drawapp\Raffling\Model\Domain\Item;

class DrawItem implements Item
{
    private string $name;
        
    public function __construct(string $name){
        $this->name = $name;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
}