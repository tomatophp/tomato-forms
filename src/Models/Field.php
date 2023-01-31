<?php

namespace TomatoPHP\TomatoForms\Models;

use Illuminate\Database\Eloquent\Model;
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
class Field extends Model
{
    use HasTranslations;

    public $translatable = ['label', 'placeholder', 'hint', 'required_message'];


    /**
     * @var array
     */
    protected $fillable = [
        'is_reactive',
        'reactive_field',
        'reactive_where',
        'is_required',
        'required_message',
        'type',
        'label',
        'key',
        'default',
        'has_options',
        'placeholder',
        'hint',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'is_reactive' => 'boolean',
        'has_options' => 'boolean',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany('TomatoPHP\TomatoForms\Models\FieldOption');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formHasFields()
    {
        return $this->hasMany('Modules\Forms\Entities\FormHasField');
    }
}
