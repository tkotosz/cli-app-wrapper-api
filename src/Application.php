<?php

namespace Tkotosz\CliAppWrapperApi;

interface Application
{
    public function initialize(): void;

    public function run(): void;
}