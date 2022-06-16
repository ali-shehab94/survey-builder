<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'survey_id',
        'question_id',
        'content'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function questions()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function surveys()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }



}
