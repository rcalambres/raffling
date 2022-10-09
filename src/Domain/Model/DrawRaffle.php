<?php
namespace Drawapp\Raffling\Domain\Model;

use Drawapp\Raffling\Domain\Model\Exceptions\DrawParticipantsInsufficientException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawEmptyAwardsException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawNotPossibleException;

class DrawRaffle
{
    private Draw $draw;
    
    public function __construct(Draw $draw){
        $this->draw = $draw;
    }
    
    /*
     * RaffleSingle() alias
     */
    public function raffle(): void
    {
        $this->raffleSingle();
    }
    
    public function raffleSingle(): void
    {
        try{
            if ($this->isValid()){
                $copyOfParticipants = clone $this->draw->getParticipants();
                $copyOfAwards = clone $this->draw->getAwards();
                while ($award = $copyOfAwards->pop()){
                    if ($award instanceof DrawItemNull){
                        break; // exit while
                    }
                    $winner = $copyOfParticipants->rand();
                    $awardAndWinner = new DrawMultiItem($award, $winner);
                    $this->draw->getResult()->add($awardAndWinner);
                    $copyOfParticipants->del($winner); // one participant -> one award
                }
            }
        }catch(DrawNotPossibleException $notPossibleDraw){
            throw $notPossibleDraw;
        }        
    }
    
    public function raffleMultiple(): void
    {
        try{
            if ($this->isValid()){
                $copyOfParticipants = clone $this->draw->getParticipants();
                $copyOfAwards = clone $this->draw->getAwards();
                while ($award = $copyOfAwards->pop()){
                    if ($award instanceof DrawItemNull){
                        break; // exit while
                    }
                    $winner = $copyOfParticipants->rand();
                    $awardAndWinner = new DrawMultiItem($award, $winner);
                    $this->draw->getResult()->add($awardAndWinner);
                }
            }
        }catch(DrawNotPossibleException $notPossibleDraw){
            throw $notPossibleDraw;
        }        
    }
    
    /*
     * Participants >= awards
     */
    protected function isValid(): bool
    {
        if ($this->draw->getParticipants()->count() <= 0 || $this->draw->getParticipants()->count() < $this->draw->getAwards()->count()){
            throw new DrawParticipantsInsufficientException();
        }
        
        if ($this->draw->getAwards()->count() <= 0){
            throw new DrawEmptyAwardsException();
        }
        
        return $this->draw->getParticipants()->count() >= $this->draw->getAwards()->count();
    }
    

}