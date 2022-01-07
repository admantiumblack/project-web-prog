<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class ClusterScc extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    protected $table = 'cluster_sccs';
    public $incrementing = false;
    protected $primaryKey = ['cluster_id', 'lecturer_id'];

    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'id');
    }

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }
}
