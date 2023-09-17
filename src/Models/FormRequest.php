<?php

namespace TomatoPHP\TomatoForms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $form_id
 * @property string $model_type
 * @property integer $model_id
 * @property string $status
 * @property mixed $payload
 * @property string $created_at
 * @property string $updated_at
 * @property Form $form
 */
class FormRequest extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['form_id', 'model_type', 'model_id', 'status', 'payload', 'created_at', 'updated_at'];

    protected $casts = [
        "payload" => "array"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo('TomatoPHP\TomatoForms\Models\Form');
    }

    public function modelable()
    {
        return $this->morphTo();
    }
}
