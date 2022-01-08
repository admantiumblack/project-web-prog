<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function cluster(){
        return $this->belongsTo(Cluster::class);
    }

    public function subjectLecturers(){
        return $this->hasMany(SubjectLecturers::class);
    }
    
    public function forms(){
        return $this->hasMany(Form::class);
    }
}
