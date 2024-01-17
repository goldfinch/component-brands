<?php

namespace Goldfinch\Component\Brands\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Brands\Models\BrandItem;

class BrandsBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'BrandsBlock';
    private static $singular_name = 'Brands';
    private static $plural_name = 'Brands';

    private static $db = [
        // 'BlockTitle' => 'Varchar',
        // 'BlockSubTitle' => 'Varchar',
        // 'BlockText' => 'HTMLText',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-circle-star';

    public function harvest(Harvest $harvest)
    {
        // ..
    }

    public function Items()
    {
        return BrandItem::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
