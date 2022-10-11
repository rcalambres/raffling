<?php
namespace Drawapp\Raffling\Model\Domain\Draw;

use Drawapp\Raffling\Model\Domain\Exceptions\DrawParticipantsInsufficientException;
use Drawapp\Raffling\Model\Domain\Exceptions\DrawEmptyAwardsException;
use Drawapp\Raffling\Model\Domain\Exceptions\DrawNotPossibleException;

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