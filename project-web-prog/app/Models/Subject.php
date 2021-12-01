<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;
use Awobaz\Compoships\Compoships;

class Subject extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    use Compoships;
    public $incrementing = false;
    protected $primaryKey = ['id', 'period'];

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }

    public function subjectLecturers(){
        return $this->hasMany(SubjectLecturers::class, 
            ['id, period'], ['subject_id', 'period']);
    }
    
}
