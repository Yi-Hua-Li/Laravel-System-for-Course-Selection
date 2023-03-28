<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class selectedcourses extends Model
{
    //
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['user_id', 'course_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function setUserAttribute($value)
    {
        $this->attributes['user_id'] = auth()->id();
    }
}

