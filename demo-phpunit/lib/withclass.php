<?php

class WithClass {
    // Mostra a versão da classe
    public $version = '1.0.0';
    
    // Guarda a instância única da classe
	protected static $_instance = NULL;
	
	// Singleton para garantir uma única instância da classe
	public static function instance() {
		if (is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    
    // Inicializador da classe
	public function __construct() {
		add_filter('the_content', array($this, 'alter_content'), 20);
    }
    
    public static function alter_content($content){

        $content = "Implementação por Classe - " . $content;
    
        return $content;
    }
}
