<?php
namespace vhub\api\core\domain\entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Gunpla extends Model
{
    use HasUuids;
    
    protected $table = 'gunpla';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    public function poses()
    {
        return $this->hasMany(Pose::class, 'gunpla_id', 'id');
    }
}
