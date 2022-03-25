<?php

class Controller 
{
    public function main():void
    {
        $this->render('main.php');
    }

    public function page404():void {
        $this->render('page404.php');
    }

    public function ventes():void
    {
        $this->render('ventes.php');
    }
    
    public function render(string $vue):void
    {
        include TEMPLATE . 'base.php';
    }

}