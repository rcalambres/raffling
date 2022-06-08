<?php
namespace Sorteando\Draw\Domain\Model\Exceptions;

class DrawNotPossibleException extends \Exception
{
    public function __construct(string $msg){
        parent::__construct($msg);       
    }
}