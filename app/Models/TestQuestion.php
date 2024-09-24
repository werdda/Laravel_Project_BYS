<?php

namespace App\Models;

use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function test(){
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function answers(){
        //return $this->hasMany(CourseAnswer::class, 'course_id', 'id');
        return $this->hasMany(TestAnswer::class, 'test_question_id');
    }
}
