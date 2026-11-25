#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Safe\Commands\FunctionInfoCommand;
use Safe\Commands\GenerateCommand;
use Safe\Commands\ScanObjectsCommand;
use Safe\Commands\DownloadDocsCommand;
use Safe\Commands\UpdateVersionsCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->addCommands([new GenerateCommand()]);
$application->addCommands([new ScanObjectsCommand()]);
$application->addCommands([new FunctionInfoCommand()]);
$application->addCommands([new DownloadDocsCommand()]);
$application->addCommands([new UpdateVersionsCommand()]);

$application->run();
