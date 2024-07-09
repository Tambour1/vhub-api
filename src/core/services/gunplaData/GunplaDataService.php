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

    public function getGunplaById(string $gunplaId):array{
        try{
            $gunpla = Gunpla::find($gunplaId);
            return $gunpla->toArray();
        }catch(\Exception $e){
            throw new GunplaDataException($e->getMessage());
        }
    }

    public function getGunplaPoses(string $gunplaId):array{
        try{
            $gunpla = Gunpla::find($gunplaId);
            return $gunpla->poses->toArray();
        }catch(\Exception $e){
            throw new GunplaDataException($e->getMessage());
        }
    }


}