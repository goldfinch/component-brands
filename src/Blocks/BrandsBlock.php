<?php

namespace Goldfinch\Component\Brands\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Brands\Models\BrandItem;

class BrandsBlock extends BaseElement
{
    use FielderTrait;

    private static $table_name = 'BrandsBlock';
    private static $singular_name = 'Brands';
    private static $plural_name = 'Brands';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-circle-star';

    public function fielder(Fielder $fielder): void
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
