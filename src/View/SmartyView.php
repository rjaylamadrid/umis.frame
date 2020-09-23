<?php
namespace umis\View;

use Smarty;

class SmartyView {
    private static $instance = null;
    private $smarty;

    private function __construct () {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('templates');
        $this->smarty->setCompileDir('templates_c');
    }

    private static function getInstance () {
        if(!self::$instance) self::$instance = new SmartyView();
        return self::$instance;
    }

    public static function display ($tpl, $vars) {
        if ($vars) $this->assign ($vars);
        return $this->smarty->fetch ("{$tpl}.tpl");
    }

    public static function assign ($vars) {
        foreach ($vars as $key => $value) $this->smarty->assign ($key, $value);
    }
}