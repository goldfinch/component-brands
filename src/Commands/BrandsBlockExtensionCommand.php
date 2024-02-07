<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:ext:block')]
class BrandsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:block';

    protected $description = 'Create BrandsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/brandsblock-extension.stub';

    protected $suffix = 'Extension';
}
