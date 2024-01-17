<?php

namespace Goldfinch\Component\Brands\Models;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\FieldType\DBHTMLText;

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

    private static $owns = [
        'Image',
        'File',
    ];

    private static $summary_fields = [
        'getLogo' => 'Logo',
        'Name' => 'Name',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->require(['Name']);

        $harvest->fields([
            'Root.Main' => [
                $harvest->string('Name'),
                ...$harvest->media('Image'),
                $harvest->upload('File', 'SVG File')->setAllowedExtensions('svg')->setDescription('has priority over the image field'),
                $harvest->html('Text'),
                $harvest->inlineLink('ALink', 'Link'),
                $harvest->checkbox('Disabled')->setDescription('hide this item from the list'),
            ],
        ]);

        $harvest->dataField('Image')->setFolderName('brands');
        $harvest->dataField('File')->setFolderName('brands');
    }

    public function getLogo()
    {
        $html = DBHTMLText::create();

        if ($this->File()->exists())
        {
            $html->setValue('<img src="' . $this->File()->getURL() . '" alt="' . $this->File()->Title . '" width="120">');
        }
        else if ($this->Image()->exists())
        {
            $html->setValue('<img src="' . $this->Image()->getURL() . '" alt="' . $this->Image()->Title . '" width="120">');
        }

        return $html;
    }
}
