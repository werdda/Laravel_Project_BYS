<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\TestQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function questions(){
        return $this->hasMany(TestQuestion::class, 'test_id', 'id');
    }

    public function peoples(){
        return $this->belongsToMany(User::class, 'test_people','test_id','user_id');
    }
}
