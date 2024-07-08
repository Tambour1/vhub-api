<?php
namespace vhub\api\infrastructure;

use Illuminate\Database\Capsule\Manager as DB;

class Eloquent
{
    public static function init(string $configPath): void
    {
        if (!file_exists($configPath)) {
            throw new \Exception("Configuration file not found: $configPath");
        }

        $config = parse_ini_file($configPath);

        if ($config === false) {
            throw new \Exception("Unable to parse configuration file: $configPath");
        }

        $db = new DB();
        $db->addConnection($config);
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}
