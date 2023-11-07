<?php

namespace Goldfinch\Component\Brands\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\CompositeField;
use SilverStripe\View\TemplateGlobalProvider;

class BrandConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'BrandConfig';

    private static $db = [];

    private static $field_descriptions = [];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // $fields->removeByName(['']);

        $fields->addFieldsToTab('Root.Main', [

            CompositeField::create(

                // ..

            ),

        ]);

        return $fields;
    }
}
