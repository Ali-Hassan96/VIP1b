<?php
namespace iBa4x\VIP;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as T;

class Main extends PluginBase implement Listener{
  public function onEneble(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger->info(T::GREEN . "By iBa4x");
    $this->seveDefaultConfig();
    $this->getResource("Config.yml");
  }
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
      case "sbb":
        if($sender->hasPermission("vip1b.command.sbb")){
          $x = $sender->getFloorX();
          $y = $sender->getFloorY();
          $z = $sender->getFloorZ();
          $level = $sender->getLevel()->getName();
          
          $this->getConfig()->set("X", $x);
          $this->getConfig()->set("Y", $y);
          $this->getConfig()->set("Z", $z);
          $this->getConfig()->set("Level", $level);
          $this->getConfig()->save();
          $sender->SendMessage("New set Block Back Player No VIP");
        }
      break;
      case "sbr":
        if($sender->hasPermission("vip1b.command.sbr")){
          $x = $sender->getFloorX();
          $y = $sender->getFloorY();
          $z = $sender->getFloorZ();
          $level = $sender->getLevel()->getName();
          
          $this->getConfig()->set("XM", $x);
          $this->getConfig()->set("YM", $y);
          $this->getConfig()->set("ZM", $z);
          $this->getConfig()->set("msg", "You do not have Permission");
          $this->getConfig()->set("popup", " ");
          $this->getConfig()->save();
          $sender->SendMessage("New set Block Join VIP");
        }
      break;
    }
  }
  public function onMove(PlayerMoveEvent $event){
    
  }
}