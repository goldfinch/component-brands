<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-brands:config')]
class ComponentBrandsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:config';

    protected $description = 'Create component-brands config';

    protected $path = 'app/_config';

    protected $type = 'component-brands yml config';

    protected $stub = 'brandconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
