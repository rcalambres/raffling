<?php
namespace Drawapp\Raffling\Domain\Model\Exceptions;

class DrawEmptyAwardsException extends DrawNotPossibleException
{
    
    private const MSG_ERROR = 'Empty Awards';
    
    public function __construct(){
        parent::__construct(self::MSG_ERROR);       
    }
}