<?php
namespace Drawapp\Raffling\Model\Domain\Exceptions;

class DrawNotPossibleException extends \Exception
{
    public function __construct(string $msg){
        parent::__construct($msg);       
    }
}