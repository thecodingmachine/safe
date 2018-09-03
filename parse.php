#!/usr/bin/env php
<?php
require 'vendor/autoload.php';

use Safe\WritePhpFunction;
use Safe\Method;
use Safe\PathResearcher;
use Safe\DocPage;
use Safe\FileCreator;

function simplePath()
{
    $docPage = new DocPage(__DIR__ . '/doc/doc-en/en/reference/filesystem/functions/fopen.xml');
    if ($docPage->detectFalsyFunction()) {
        $functionObjects = $docPage->getMethodSynopsis();
        foreach ($functionObjects as $functionObject) {
            $method = new Method($functionObject);
            $writePhpFunction = new WritePhpFunction($method);
            $phpFunctions[] = $writePhpFunction->getPhpPrototypeFunction();
            print_r($functionObject->methodparam[2]->initializer);
        }
    }
/*    $docPage = new DocPage(__DIR__ . '/doc/doc-en/en/reference/apc/functions/apc-dec.xml');
    if ($docPage->detectFalsyFunction()) {
        $functionObjects = $docPage->getMethodSynopsis();
        foreach ($functionObjects as $functionObject) {*/
            /*            $method = new Method($functionObject);
                        $writePhpFunction = new WritePhpFunction($method);
                        $phpFunctions[] = $writePhpFunction->getPhpPrototypeFunction();*/
/*            print_r($functionObject);
        }
    }*/
    //print_r($method);
}

function multiPath()
{
    $pathResearcher = new PathResearcher(__DIR__ . '/doc/doc-en/en/reference/*');
    $paths = $pathResearcher->getPaths();
    foreach ($paths as $path) {
        $docPage = new DocPage($path);
        if ($docPage->detectFalsyFunction()) {
            $functionObjects = $docPage->getMethodSynopsis();
            foreach ($functionObjects as $functionObject) {
                $method = new Method($functionObject);
                $writePhpFunction = new WritePhpFunction($method);
                $protoFunctions[] = $writePhpFunction->getPhpPrototypeFunction();
                $phpFunctions[] = $writePhpFunction->getPhpFunctionalFunction();
            }
        }
    }
    $fileCreator = new FileCreator();
    $fileCreator->generateXlsFile($protoFunctions, __DIR__ . '/generated/lib.xls');
    $fileCreator->generatePhpFile($phpFunctions, __DIR__ . '/generated/lib.php');
}


//simplePath();
multiPath();
