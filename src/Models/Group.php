<?php

namespace TomatoPHP\TomatoForms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * @property integer $id
 * @property string $type
 * @property string $label
 * @property string $key
 * @property string $placeholder
 * @property string $hint
 * @property string $default
 * @property boolean $has_options
 * @property boolean $is_required
 * @property boolean $is_reactive
 * @property string $reactive_field
 * @property string $reactive_where
 * @property string $required_message
 * @property string $created_at
 * @property string $updated_at
 * @property FieldOption[] $fieldOptions
 */
class Group extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'key',
        'created_at',
        'updated_at'
    ];

}
