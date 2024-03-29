<?php

$finder = PhpCsFixer\Finder::create()
    ->in('./src')
    ->in('./tests');

return (new PhpCsFixer\Config)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_add_missing_param_annotation' => true,
        'linebreak_after_opening_tag' => true,
        'phpdoc_summary' => false,
        'phpdoc_no_package' => false,
        'phpdoc_order' => true,
        'phpdoc_align' => true,
        'ordered_imports' => true,
    ])
    ->setFinder($finder);
