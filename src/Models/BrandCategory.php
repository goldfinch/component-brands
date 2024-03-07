<?php

namespace Goldfinch\Component\Brands\Models;

use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;

class BrandCategory extends DataObject
{
    use Millable;

    private static $table_name = 'BrandCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $belongs_many_many = [
        'Items' => BrandItem::class,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Items.Count' => 'Brands',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);

        return $fields;
    }
}
