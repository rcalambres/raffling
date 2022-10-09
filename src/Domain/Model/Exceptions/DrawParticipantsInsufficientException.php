<?php
namespace Drawapp\Raffling\Domain\Model\Exceptions;

class DrawParticipantsInsufficientException extends DrawNotPossibleException
{
    
    private const MSG_ERROR = 'Insufficients Participants: Awards count is bigger than Participants count';
    
    public function __construct(){
        parent::__construct(self::MSG_ERROR);       
    }
}