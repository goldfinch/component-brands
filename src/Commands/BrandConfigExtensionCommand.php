<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-brands:brandconfig')]
class BrandConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:brandconfig';

    protected $description = 'Create BrandConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-brands config extension';

    protected $stub = 'brandconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
