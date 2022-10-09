<?php
namespace Drawapp\Raffling\Domain\Model;

use Drawapp\Raffling\Domain\Model\Exceptions\DrawParticipantsInsufficientException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawEmptyAwardsException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawNotPossibleException;

class DrawShow
{
    private Draw $draw;
    
    public function __construct(Draw $draw){
        $this->draw = $draw;
    }
    
    public function showParticipants(): string
    {
        return $this->draw->getParticipants()->show();
    }
    
    public function showAwards(): string
    {
        return $this->draw->getAwards()->show();
    }
    
    public function showResult(): string
    {
        return $this->draw->getResult()->show();
    }
}