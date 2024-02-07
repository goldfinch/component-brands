<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:config')]
class BrandsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:config';

    protected $description = 'Create Brands YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
