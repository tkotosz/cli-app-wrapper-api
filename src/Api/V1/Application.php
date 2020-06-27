<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1;

interface Application
{
    public function init(): int;

    public function run(): void;
}
