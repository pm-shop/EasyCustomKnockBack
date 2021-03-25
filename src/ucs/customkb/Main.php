<?php

namespace ucs\customkb;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use ucs\customkb\events\EntityDamage;

class Main extends PluginBase
{
    /** @var Main $instance */
    public static Main $instance;

    public function onEnable()
    {
        self::$instance = $this;

        self::$instance->getLogger()->info("§9» §aCustom KB - Pocket Mine Shop §9«");
        self::$instance->getServer()->getPluginManager()->registerEvents(new EntityDamage(), $this);
    }

    public function onDisable()
    {
        self::$instance->getLogger()->info("§9» §cCustom KB - Pocket Mine Shop §9«");
    }

    public static function getInstance(): self {
        return self::$instance;
    }

    public static function getIntoConfig(String $config, String $get) {
        return self::getConfigFile($config)->get($get);
    }

    public static function getNestedIntoConfig(String $config, String $get) {
        return self::getConfigFile($config)->getNested($get);
    }

    public static function getConfigFile(String $config): Config {
        return new Config(self::getInstance()->getDataFolder() . $config . ".yml", Config::YAML);
    }
}