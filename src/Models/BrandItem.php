<?php

namespace Goldfinch\Component\Brands\Models;

use SilverStripe\Assets\File;
use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Goldfinch\Component\Brands\Configs\BrandConfig;

class BrandItem extends DataObject
{
    private static $table_name = 'BrandItem';
    private static $singular_name = 'brand';
    private static $plural_name = 'brands';

    private static $db = [
        'Name' => 'Varchar',
        'Text' => 'HTMLText',
        'Disabled' => 'Boolean',
        'SortOrder' => 'Int',
    ];

    private static $has_one = [
        'Image' => Image::class,
        'File' => File::class,
        'ALink' => Link::class,
    ];

    private static $owns = ['Image', 'File'];

    private static $summary_fields = [
        'getLogo' => 'Logo',
        'Name' => 'Name',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Name']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Name'),
                ...$fielder->media('Image'),
                $fielder
                    ->upload('File', 'SVG File')
                    ->setAllowedExtensions('svg')
                    ->setDescription('has priority over the image field'),
                $fielder->html('Text'),
                $fielder->inlineLink('ALink', 'Link'),
                $fielder
                    ->checkbox('Disabled')
                    ->setDescription('hide this item from the list'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('brands');
        $fielder->dataField('File')->setFolderName('brands');

        $cfg = BrandConfig::current_config();

        if (!$cfg->EnabledImageUpload) {
            $fielder->remove('Image');
        }
    }

    public function getLogo()
    {
        $html = DBHTMLText::create();

        if ($this->File()->exists()) {
            $html->setValue(
                '<img src="' .
                    $this->File()->getURL() .
                    '" alt="' .
                    $this->File()->Title .
                    '" width="120">',
            );
        } elseif ($this->Image()->exists()) {
            $html->setValue(
                '<img src="' .
                    $this->Image()->getURL() .
                    '" alt="' .
                    $this->Image()->Title .
                    '" width="120">',
            );
        }

        return $html;
    }
}
