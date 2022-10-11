<?php
namespace Drawapp\Raffling\Model\Domain;

use Drawapp\Raffling\Model\Domain\Item;
use Drawapp\Raffling\Model\Domain\DrawItem\DrawItemNull;

abstract class AbastractItemList implements ItemList
{
    private array $items = [];
    
    public function count(): int
    {
        return count($this->items);    
    }
    
    public function add(Item $item): void
    {
        $this->items[] = $item;   
    }
    
    private function delByPosition(int $position = 0): bool
    {
        if (!isset($this->items[$position])){
            return false;
        }
        
        array_splice($this->items, $position, 1);
        
        return true;
    }
    
    public function del(int|Item $position = 0): bool
    {
        if ($position instanceof Item){
            return $this->delByPosition($this->search($position));                
        }else{
            return $this->delByPosition($position);
        }
    }
    
    public function pop(): Item
    {
        $numElements = count($this->items);
        
        if ($numElements > 0){
            $positionLastElement = $numElements - 1;
            $lastElement = $this->items[$positionLastElement];
            $this->del($positionLastElement);
            
            return $lastElement;
        }
        
        return new DrawItemNull();
        
    }
    
    public function clear(): bool
    {
        unset($this->items);
        $this->items = [];
    }
    
    public function rand(): Item
    {
        $numElements = count($this->items);
        if ($numElements > 0){
            $maxPosition = $numElements - 1;
            $randPosition = rand(0, $maxPosition);
            return $this->items[$randPosition];
        }
        
        return new DrawItemNull();
    }
    
    public function show(): string
    {
        $itemsList = '';
        
        $firstIterationLoop = true;
        foreach ($this->items as $item) {
            if (!$firstIterationLoop){
                $itemsList .= ", ";
            }else{
                $firstIterationLoop = false;
            }
            
            $itemsList .= $item->getName();
        }
        
        return $itemsList;
    }
    
    private function search(Item $item): int
    {
        $position = -1;
        
        foreach ($this->items as $index => $originalItem) {
        
            if ($originalItem === $item){
                return $index;
            }
        }
        
        return $position;
    }
    
}