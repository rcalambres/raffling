<?php

namespace Drawapp\Raffling\Model\Application\Draw\Get;

use Drawapp\Raffling\Model\Application\ApplicationServiceRequest;

class GetDrawRequest implements ApplicationServiceRequest
{
    public function __construct(
        private string $id
    ) {}
    
    public function getId(){
        return $this->id;
    }
}