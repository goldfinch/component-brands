<?php

namespace Goldfinch\Component\Brands\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class BrandConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'BrandConfig';

    private static $db = [
        'EnabledImageUpload' => 'Boolean',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->fields([
            'Root.Main' => [
                $harvest->checkbox('EnabledImageUpload', 'Enable Image upload')->setDescription('when it\'s disabled, only SVG upload available'),
            ],
        ]);
    }
}
