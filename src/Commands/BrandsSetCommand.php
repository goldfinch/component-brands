<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-brands')]
class BrandsSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands';

    protected $description = 'Set of all [goldfinch/component-brands] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find('vendor:component-brands:ext:admin');
        $command->run(new ArrayInput(['name' => 'BrandsAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:ext:config');
        $command->run(new ArrayInput(['name' => 'BrandConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:ext:block');
        $command->run(new ArrayInput(['name' => 'BrandsBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:ext:item');
        $command->run(new ArrayInput(['name' => 'BrandItem']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:ext:category');
        $command->run(new ArrayInput(['name' => 'BrandCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:config');
        $command->run(new ArrayInput(['name' => 'component-brands']), $output);

        $command = $this->getApplication()->find('vendor:component-brands:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
