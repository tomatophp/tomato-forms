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
    protected $fillable = ['account_id', 'model_id', 'model_type', 'key', 'value', 'created_at', 'updated_at'];

    protected $casts = [
        'value' => 'array',
    ];

    public function formRequest(){
        return $this->belongsTo('TomatoPHP\TomatoForms\Models\FormRequest');
    }
}
