<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-brands:ext:admin')]
class BrandsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:admin';

    protected $description = 'Create BrandsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/brandsadmin-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
