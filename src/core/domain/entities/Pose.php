<?php
namespace vhub\api\core\domain\entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pose extends Model
{   
    use HasUuids;

    protected $table = 'poses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    public function gunpla()
    {
        return $this->belongsTo(Gunpla::class, 'gunpla_id', 'id');
    }
}
