<?php

namespace Drawapp\Raffling\Model\Application\Draw\Get;

use Drawapp\Raffling\Model\Application\ApplicationService;
use Drawapp\Raffling\Model\Application\ApplicationServiceRequest;
use Drawapp\Raffling\Model\Application\ApplicationServiceResponse;

class GetDrawService implements ApplicationService
{
    public function execute(ApplicationServiceRequest $applicationServiceRequest): ApplicationServiceResponse
    {
        // Domain GetDraw Service
        return new GetDrawResponse($applicationServiceRequest->getId());
    }
}