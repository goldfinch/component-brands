<?php

namespace Goldfinch\Component\Brands\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class BrandConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'BrandConfig';

    private static $db = [
        'EnabledImageUpload' => 'Boolean',
        'DisabledCategories' => 'Boolean',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('EnabledImageUpload', 'Enable Image upload')->setDescription('when it\'s disabled, only SVG upload available'),
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
            ],
        ]);

        return $fields;
    }
}
