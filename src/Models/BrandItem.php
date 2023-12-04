<?php

namespace Goldfinch\Component\Brands\Models;

use SilverStripe\Assets\Image;
use gorriecoe\Link\Models\Link;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use gorriecoe\LinkField\LinkField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Goldfinch\FocusPointExtra\Forms\UploadFieldWithExtra;

class BrandItem extends DataObject
{
    private static $table_name = 'BrandItem';
    private static $singular_name = 'brand';
    private static $plural_name = 'brands';

    private static $db = [
        'Name' => 'Varchar',
        'Text' => 'HTMLText',
        'Disabled' => 'Boolean',
    ];

    private static $has_one = [
        'Image' => Image::class,
        'ALink' => Link::class,
    ];

    private static $owns = [
        'Image',
    ];

    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $casting = [];
    // private static $defaults = [];

    private static $summary_fields = [
        'Name' => 'Name',
        'Text.Summary' => 'Text',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Name',
        'Text',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Image',
            'Name',
            'Text',
            'ALinkID',
            'Disabled',
        ]);

        // dd($fields);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...[
                    TextField::create('Name', 'Name'),
                ],
                ...UploadFieldWithExtra::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    HTMLEditorField::create('Text', 'Text'),
                    LinkField::create('ALink', 'Link', $this),
                    CheckboxField::create('Disabled','Disabled')->setDescription('hide this item from the list'),
                ],
            ]
        );

        return $fields;
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
