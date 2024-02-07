<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:ext:admin')]
class BrandsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:admin';

    protected $description = 'Create BrandsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/brandsadmin-extension.stub';

    protected $prefix = 'Extension';
}
