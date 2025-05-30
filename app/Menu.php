<?php

namespace App;

class Menu
{
    public $menu = [];
    public $user;
    public $modules;
    public function __construct($user)
    {
        $this->user = $user;
        $this->modules = getActiveModules();
        $this->modules[] =  'Base';
    }
    public function add(array $array): void
    {
        if (in_array($array['module'], $this->modules) && ((empty($array['permission'])) ||  $this->user->isAbleTo($array['permission']))) {
            $this->menu[] = $array;
        }
    }
}
