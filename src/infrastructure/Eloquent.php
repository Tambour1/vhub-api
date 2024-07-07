<?php

namespace vhub\api\infrastructure;

//BD
use Illuminate\Database\Capsule\Manager as DB;

class Eloquent
{
   
    public static function init(string $configPath): void
    {
        $db = new DB();

        $db->addConnection(parse_ini_file($configPath));

        $db->setAsGlobal();
        $db->bootEloquent();
    }
}