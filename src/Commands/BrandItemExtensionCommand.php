<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-brands:ext:item')]
class BrandItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:item';

    protected $description = 'Create BrandItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-brands item extension';

    protected $stub = './stubs/branditem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
