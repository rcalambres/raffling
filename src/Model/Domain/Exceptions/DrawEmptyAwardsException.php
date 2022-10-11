<?php
namespace Drawapp\Raffling\Model\Domain\Exceptions;

class DrawEmptyAwardsException extends DrawNotPossibleException
{
    
    private const MSG_ERROR = 'Empty Awards';
    
    public function __construct(){
        parent::__construct(self::MSG_ERROR);       
    }
}