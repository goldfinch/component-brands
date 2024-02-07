<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:ext:item')]
class BrandItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:item';

    protected $description = 'Create BrandItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/branditem-extension.stub';

    protected $suffix = 'Extension';
}
