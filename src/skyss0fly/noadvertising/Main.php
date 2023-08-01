<?php

namespace skyss0fly\noadvertising;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {

public function onLoad(): void {
$this->savedefaultconfig();
}
  public function onEnable(): void {
$this->getServer()->getPluginManager()->registerEvents($this, $this);

    
  }

public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
  switch ($command->getName()) {
            case "noadvert":
$message = $this->getConfig()->get("Message");
$value = $this->getConfig()->get("Enabled");
  if ($value) {
  $this->setfalse();
  $sender->sendMessage("Disabled the moderation");
  
}
  else {
$this->settrue();
  $sender->sendMessage("Enabled the moderation");
  
  }
  
}
  return true;
}

  
public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        $chat = $event->getMessage();
  $message = $this->getConfig()->get("Message");
    $bannedmessage = $this->getConfig()->get("Banned");
    $l = $this->getConfig()->get("Enabled");
  
  if($l) {

$substring_index = stripos($chat, $bannedmessage);
 
if($substring_index !== false) {
    $player->sendMessage($message);
}
  else{

  }
}
  else {

  // nothing lol
  }
}
 public function settrue(): void {
   $this->getConfig()->set("Enabled", true);
        $this->getConfig()->save();
    }
  public function setfalse(): void {
    $this->getConfig()->set("Enabled", False);
        $this->getConfig()->save();
  }
}
