<?php

namespace Goldfinch\Component\Brands\Configs;

use Goldfinch\Fielder\Fielder;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\View\TemplateGlobalProvider;

class BrandConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, FielderTrait;

    private static $table_name = 'BrandConfig';

    private static $db = [
        'EnabledImageUpload' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('EnabledImageUpload', 'Enable Image upload')->setDescription('when it\'s disabled, only SVG upload available'),
            ],
        ]);
    }
}
