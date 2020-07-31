<?php

namespace Taco\djlistener;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\utils\Config;

use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use CortexPE\DiscordWebhookAPI\Embed;


class Main extends PluginBase implements Listener {
    
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $webHook = new Webhook($this->getConfig()->get("WebhookURL"));
            $msg = new Message();
            $embed = new Embed();
            $embed->setTitle($this->getConfig()->get("WebhookURL"));
            $embed->setColor(0x00FF00);
            $embed->setDescription($player->getName() . " has joined the server\n");
            $webHook->send($msg);
    }
  public function onLeave(PlayerQuitEvent $event) {
      $player = $event->getPlayer();
      $webHook = new Webhook($this->getConfig()->get("WebhookURL"));
            $msg = new Message();
            $embed = new Embed();
            $embed->setTitle($this->getConfig()->get("ServerName"));
            $embed->setColor(0x00FF00);
            $embed->setDescription($player->getName() . " has left the server.");
            $msg->addEmbed($embed);
            $webHook->send($msg);
      
  }
}
