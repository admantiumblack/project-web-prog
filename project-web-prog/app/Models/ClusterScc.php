<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasCompositePrimaryKey;

class ClusterScc extends Model
{
    use HasFactory;
    protected $table = 'cluster_sccs';
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'id');
    }

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }
}
