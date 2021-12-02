<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;
use Awobaz\Compoships\Compoships;

class SubjectLecturer extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    use Compoships;
    public $incrementing = false;
    protected $primaryKey = ['subject_id', 'period'];

    public function subject(){
        return $this->belongsTo(Subject::class, 
                ['subject_id', 'period'], ['id', 'period']);
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'id');
    }


}
