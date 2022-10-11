<?php
namespace Drawapp\Raffling\Model\Domain\DrawItem;

use Drawapp\Raffling\Model\Domain\Item;

class DrawMultiItem implements Item
{
    private Item $award;
    private Item $winner;
        
    public function __construct(Item $award, Item $winner){
        $this->award = $award;
        $this->winner = $winner;
    }
    
    public function getName(): string
    {
        return $this->award->getName() . " -> " . $this->winner->getName();
    }
    
}