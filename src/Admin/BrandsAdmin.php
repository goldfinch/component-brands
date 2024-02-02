<?php

namespace Goldfinch\Component\Brands\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Brands\Models\BrandItem;
use Goldfinch\Component\Brands\Blocks\BrandsBlock;
use Goldfinch\Component\Brands\Configs\BrandConfig;
use Goldfinch\Component\Brands\Models\BrandCategory;

class BrandsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'brands';
    private static $menu_title = 'Brands';
    private static $menu_icon_class = 'font-icon-circle-star';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        BrandItem::class => [
            'title' => 'Brands',
        ],
        BrandsBlock::class => [
            'title' => 'Blocks',
        ],
        BrandConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = BrandConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($models[BrandCategory::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[BrandsBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[BrandConfig::class]);
        }

        return $models;
    }
}
