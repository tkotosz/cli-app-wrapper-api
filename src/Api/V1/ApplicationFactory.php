<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1;

interface ApplicationFactory
{
    public static function create(ApplicationManager $applicationManager): Application;
}