<?php
namespace Drawapp\Raffling\Domain\Model;

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