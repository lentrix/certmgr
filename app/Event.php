<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'details',
        'tags',
        'person_incharge',
        'created_by',
        'template_path'
    ];

    public function createdBy() {
        return $this->belongsTo('App\User');
    }

    public function certificates() {
        return $this->hasMany('App\Certificate');
    }
}
