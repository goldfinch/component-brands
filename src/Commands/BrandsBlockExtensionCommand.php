<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-brands:brandsblock')]
class BrandsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:brandsblock';

    protected $description = 'Create BrandsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-brands block extension';

    protected $stub = 'brandsblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
