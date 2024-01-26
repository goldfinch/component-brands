<?php

namespace Goldfinch\Component\Brands\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-brands:templates')]
class BrandsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-brands:templates';

    protected $description = 'Publish [goldfinch/component-brands] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-brands');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-brands/templates/Goldfinch/Component/Brands/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Brands/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/BrandsBlock.ss',
                    'to' => $themePath . 'Blocks/BrandsBlock.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
