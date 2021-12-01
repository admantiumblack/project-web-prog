<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class Subjects extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    public $incrementing = false;
    protected $primaryKey = ['id', 'period'];
    
}
