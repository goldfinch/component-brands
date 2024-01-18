<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-brands')]
class ComponentBrandsCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands';

    protected $description = 'Populate goldfinch/component-brands components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-brands-branditem',
        );
        $input = new ArrayInput(['name' => 'BrandItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands-brandcategory',
        );
        $input = new ArrayInput(['name' => 'BrandCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands-brandconfig',
        );
        $input = new ArrayInput(['name' => 'BrandConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-brands-brandsblock',
        );
        $input = new ArrayInput(['name' => 'BrandsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('templates:component-brands');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-brands');
        $input = new ArrayInput(['name' => 'component-brands']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
