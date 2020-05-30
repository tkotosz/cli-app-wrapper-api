<?php

namespace Tkotosz\CliAppWrapperApi;

interface Application
{
    public function init(): int;

    public function run(): void;
}