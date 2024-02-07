<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:ext:category')]
class BrandCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:ext:category';

    protected $description = 'Create BrandCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/brandcategory-extension.stub';

    protected $prefix = 'Extension';
}
