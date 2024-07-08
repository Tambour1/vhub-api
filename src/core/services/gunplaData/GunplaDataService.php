<?php

namespace vhub\api\core\services\gunplaData;

use vhub\api\core\domain\entities\Gunpla;
use vhub\api\core\services\gunplaData\GunplaDataInterface;


class GunplaDataService implements GunplaDataInterface{

    
    public function getGunplas():array{
        try{
            $gunplas = Gunpla::all();
            return $gunplas->toArray();
        }catch(\Exception $e){
            throw new GunplaDataException($e->getMessage());
        }
    }


}