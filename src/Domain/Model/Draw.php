<?php
namespace Sorteando\Draw\Domain\Model;

use Sorteando\Draw\Domain\Model\Exceptions\DrawParticipantsInsufficientException;
use Sorteando\Draw\Domain\Model\Exceptions\DrawEmptyAwardsException;
use Sorteando\Draw\Domain\Model\Exceptions\DrawNotPossibleException;

class Draw
{
    private string $uuid;
    
    private ItemList $participants;
    
    private ItemList $awards;
    
    private DrawResult $result;
    
    public function __construct(){
        $this->uuid = uniqid();
        $this->participants = new DrawItemList();
        $this->awards = new DrawItemList();
        $this->result = new DrawResult();
    }
    
    public function addParticipant(Participant $participant){
        $this->participants->add($participant);
    }
    
    public function delParticipant(int $position){
        $this->participants->del($position);
    }
    
    public function addAward(Award $award){
        $this->awards->add($award);
    }
    
    public function delAward(int $position){
        $this->awards->del($position);
    }
    
    public function showParticipants(): string
    {
        return $this->participants->show();
    }
    
    public function showAwards(): string
    {
        return $this->awards->show();
    }
    
    public function showResult(): string
    {
        return $this->result->show();
    }
    
    /*
     * Participants >= awards
     */
    protected function isValid(): bool
    {
        if ($this->participants->count() <= 0 || $this->participants->count() < $this->awards->count()){
            throw new DrawParticipantsInsufficientException();
        }
        
        if ($this->awards->count() <= 0){
            throw new DrawEmptyAwardsException();
        }
        
        return $this->participants->count() >= $this->awards->count();
    }

    public function raffle(): void
    {
        try{
            if ($this->isValid()){
                $copyOfParticipants = clone $this->participants;
                $copyOfAwards = clone $this->awards;
                while ($award = $copyOfAwards->pop()){
                    if ($award instanceof DrawItemNull){
                        break; // exit while
                    }
                    $winner = $copyOfParticipants->rand();
                    $awardAndWinner = new DrawMultiItem($award, $winner);
                    $this->result->add($awardAndWinner);
                    $copyOfParticipants->del($winner); // one participant -> one award
                }
            }
        }catch(DrawNotPossibleException $notPossibleDraw){
            throw $notPossibleDraw;
        }
        
        
    }
    

}