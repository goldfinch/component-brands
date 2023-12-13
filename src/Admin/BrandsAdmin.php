<?php

namespace Goldfinch\Component\Brands\Admin;

use Goldfinch\Component\Brands\Models\BrandItem;
use Goldfinch\Component\Brands\Blocks\BrandsBlock;
use Goldfinch\Component\Brands\Configs\BrandConfig;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class BrandsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'brands';
    private static $menu_title = 'Brands';
    private static $menu_icon_class = 'font-icon-circle-star';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        BrandItem::class => [
            'title'=> 'Brands',
        ],
        BrandsBlock::class => [
            'title'=> 'Blocks',
        ],
        BrandConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
