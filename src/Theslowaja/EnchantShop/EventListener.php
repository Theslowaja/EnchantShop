<?php
namespace Theslowaja\EnchantShop;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\Item;
use pocketmine\block\EnchantingTable;
use Theslowaja\EnchantShop\Main;

/**
 * Class EventListener
 * @package Theslowaja\EnchantShop
 */
Class EventListener implements Listener{
    
    /** @var EnchantShop */
    private $plugin;
    
    /**
    * EventListener constructor.
    * @param EnchantShop $plugin
    */
    public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
    
    /**
    * @param PlayerInteractEvent $ev
    */
    public function onInteract(PlayerInteractEvent $ev){
        if($ev->getAction() !== PlayerInteractEvent::RIGHT_CLICK_BLOCK) return;
        $table = $this->plugin->shop->getNested('air');
        if($table and $ev->getBlock() instanceof EnchantingTable){
            $ev->cancel();
            $this->plugin->ListForm($ev->getPlayer());
        }
    }
}
