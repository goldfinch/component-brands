<?php

namespace Goldfinch\Component\Brands\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Brands\Models\BrandItem;
use Goldfinch\Component\Brands\Blocks\BrandsBlock;
use Goldfinch\Component\Brands\Models\BrandCategory;

class BrandsHarvest extends Harvest
{
    public static function run(): void
    {
        BrandCategory::mill(5)->make();

        BrandItem::mill(30)->make()->each(function($item) {
            $categories = BrandCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                BrandsBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Brands',
                ]);
            }
        }
    }
}
