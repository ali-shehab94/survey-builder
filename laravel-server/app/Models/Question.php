<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'type',
        'content'
    ];

    public function surveys()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'question_id', 'id');
    }
}
