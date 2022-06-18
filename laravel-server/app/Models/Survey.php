<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'
    ];
    public function questions()
    {
        return $this->hasMany(Question::class, 'survey_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'survey_id', 'id');
    }

    public function choices()
    {
        return $this->hasManyThrough(Choice::class, Question::class);
    }
}
