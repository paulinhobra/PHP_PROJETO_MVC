<?php

class HomeController{

    public function index(){
        
        ModelPostagem::selecionarPostagens();

    }

}