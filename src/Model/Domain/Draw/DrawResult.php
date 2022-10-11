<?php
namespace Drawapp\Raffling\Model\Domain\Draw;

use Drawapp\Raffling\Model\Domain\ItemList;
use Drawapp\Raffling\Model\Domain\DrawItem\DrawItemList;
use Drawapp\Raffling\Model\Domain\DrawItem\DrawMultiItem;

class DrawResult
{
    private ItemList $awardsAndWiners; 
    
    public function __construct(){
        $this->awardsAndWiners = new DrawItemList();
    }
    
    public function add(DrawMultiItem $awardAndWinner): void
    {
        $this->awardsAndWiners->add($awardAndWinner);
    }
    
    public function show(): string
    {
        return $this->awardsAndWiners->show();
    }
}