<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLecturer extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }


}
