<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__.'/api/src', __DIR__.'/front/src'])
;

$config = new PhpCsFixer\Config();

return $config->setRules([
        '@Symfony' => true,
        'no_unused_imports' => true,
    ])
    ->setFinder($finder)
;
