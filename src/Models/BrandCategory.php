<?php

namespace Goldfinch\Component\Brands\Models;

use Goldfinch\Fielder\Fielder;
use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;

class BrandCategory extends DataObject
{
    use FielderTrait, Millable;

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);
    }
}
