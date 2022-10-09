<?php
namespace Drawapp\Raffling\Domain\Model;

use Drawapp\Raffling\Domain\Model\Exceptions\DrawParticipantsInsufficientException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawEmptyAwardsException;
use Drawapp\Raffling\Domain\Model\Exceptions\DrawNotPossibleException;

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
    
    public function getParticipants(): ItemList
    {
        return $this->participants;
    }
    
    public function getAwards(): ItemList
    {
        return $this->awards;
    }
    
    public function getResult(): DrawResult
    {
        return $this->result;
    }

}