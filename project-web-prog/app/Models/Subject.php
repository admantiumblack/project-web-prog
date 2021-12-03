<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id';

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }

    public function subjectLecturers(){
        return $this->hasMany(SubjectLecturers::class, 
            'id', 'subject_id');
    }
    
    public function forms(){
        return $this->hasMany(Form::class, 'id', 'subject_id');
    }
}
