<?php

namespace App\Models;

use App\Models\TestQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeopleAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function question(){
        return $this->belongsTo(TestQuestion::class, 'test_question_id');
    }
}
