<?php
namespace Sorteando\Draw\Domain\Model;

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