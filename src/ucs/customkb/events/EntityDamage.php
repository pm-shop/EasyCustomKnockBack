<?php

namespace ucs\customkb\events;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use ucs\customkb\Main;

class EntityDamage implements Listener
{
    public function onDamage(EntityDamageByEntityEvent $event) {
        $kb = Main::getIntoConfig("config", "kb");
        if($kb === "default") {
        }else{
            $event->setKnockBack($kb);
        }
    }
}