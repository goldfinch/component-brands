<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:ext:config')]
class BrandConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:config';

    protected $description = 'Create BrandConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/brandconfig-extension.stub';

    protected $suffix = 'Extension';
}
