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
        $command = $this->getApplication()->find(
            'vendor:component-brands:ext:admin',
        );
        $input = new ArrayInput(['name' => 'BrandsAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands:ext:config',
        );
        $input = new ArrayInput(['name' => 'BrandConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands:ext:block',
        );
        $input = new ArrayInput(['name' => 'BrandsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands:ext:item',
        );
        $input = new ArrayInput(['name' => 'BrandItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-brands:config');
        $input = new ArrayInput(['name' => 'component-brands']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-brands:templates');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
