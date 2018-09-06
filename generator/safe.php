#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Safe\GenerateCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->addCommands([new GenerateCommand()]);

$application->run();
