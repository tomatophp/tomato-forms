<?php

namespace TomatoPHP\TomatoForms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $key
 * @property string $endpoint
 * @property string $method
 * @property string $title
 * @property string $description
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class Form extends Model
{
    use HasTranslations;

    public $translatable = ['name','title', 'description'];

    /**
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'key',
        'endpoint',
        'method',
        'title',
        'description',
        'is_active',
        'created_at',
        'updated_at'
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fields(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'form_has_fields', 'form_id', 'field_id')->withPivot('order');
    }
}
