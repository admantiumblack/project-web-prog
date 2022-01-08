<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function clusterScc(){
        return $this->hasOne(ClusterScc::class);
    }

    public function subjectLecturers(){
        return $this->hasMany(SubjectLecturer::class);
    }

}
