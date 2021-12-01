<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class ClusterSccs extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    protected $table = 'cluster_sccs';
    public $incrementing = false;
    protected $primaryKey = ['cluster_id', 'lecturer_id', 'period'];
}
