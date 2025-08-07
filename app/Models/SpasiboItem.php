<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpasiboItem extends Model
{
    //
    use HasFactory;

    protected $table = 'spasibo-items';

    protected $fillable = [
        'a_type',
        'name',
        'description',
        'active',
        'name_en',
        'description_en',
        'questions',
        'questions_en'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    // Если нужно обратное преобразование для API (в camelCase)
    public function toArray()
    {
        return [
            'id' => $this->id,
            'aType' => $this->a_type,
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
            'nameEn' => $this->name_en,
            'descriptionEn' => $this->description_en,
            'questions' => $this->questions,
            'questionsEn' => $this->questions_en,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
