<?php
namespace Drawapp\Raffling\Model\Domain;

interface ItemList
{  
    public function count(): int;
    public function add(Item $item): void;
    public function del(int $position = -1):bool;
    public function pop(): Item;
    public function clear(): bool;
    public function rand(): Item;
    
}