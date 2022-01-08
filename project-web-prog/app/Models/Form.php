<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class Form extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}
