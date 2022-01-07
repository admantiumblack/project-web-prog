<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class Form extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    public $incrementing = false;
    protected $primaryKey = ['subject_id', 'period'];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}
