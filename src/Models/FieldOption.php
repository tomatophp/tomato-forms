<?php

namespace TomatoPHP\TomatoForms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property integer $id
 * @property integer $field_id
 * @property string $type
 * @property string $label
 * @property string $key
 * @property string $created_at
 * @property string $updated_at
 * @property Field $field
 */
class FieldOption extends Model
{
    use HasTranslations;

    public $translatable = ['label'];

    /**
     * @var array
     */
    protected $fillable = ['field_id', 'type', 'label', 'key', 'created_at', 'updated_at','parent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function field()
    {
        return $this->belongsTo('TomatoPHP\TomatoForms\Models\Field');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function childs()
    {
        return $this->hasMany('TomatoPHP\TomatoForms\Models\FieldOption','parent_id');
    }
}
