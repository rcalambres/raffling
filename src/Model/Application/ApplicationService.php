<?php

namespace Drawapp\Raffling\Model\Application;

interface ApplicationService
{
    public function execute(ApplicationServiceRequest $applicationServiceRequest): ApplicationServiceResponse;
}
