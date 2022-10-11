<?php

namespace Drawapp\Raffling\Model\Application\Draw\Get;

use Drawapp\Raffling\Model\Application\ApplicationServiceResponse;

class GetDrawResponse implements ApplicationServiceResponse
{
    public function __construct(
        private string $id
    ) {}

    public function toString(){
        return $this->id;
    }
}