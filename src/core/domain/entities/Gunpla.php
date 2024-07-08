<?php
namespace vhub\api\core\domain\entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Gunpla extends \Illuminate\Database\Eloquent\Model
{

    use HasUuids;
    
    protected $table = 'gunpla';
    protected $primaryKey = 'id';
    public $timestamps = false;

}