<?php

namespace Goldfinch\Component\Brands\Blocks;

use Goldfinch\Blocks\Models\BlockElement;
use Goldfinch\Component\Brands\Models\BrandItem;
use Goldfinch\Component\Brands\Models\BrandCategory;

class BrandsBlock extends BlockElement
{
    private static $table_name = 'BrandsBlock';
    private static $singular_name = 'Brand';
    private static $plural_name = 'Brands';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-circle-star';

    public function Items()
    {
        return BrandItem::get();
    }

    public function Categories()
    {
        return BrandCategory::get();
    }
}
