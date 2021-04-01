<?php

/**
 * Plugin Name: Demonstração de testes com PHPUnit
 * Description: Este plugin implementa o básico para testes com PHPUnit.
 * Plugin URI: https://xpi.com.br
 * Author: Guilda WordPress
 * Version: 1.0
 */

// Implementação Recomendada
final class Demo_PHPUnit {
	
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

	// Contrutor da Classe
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init();
	}

	// Todas as constantes que serão usadas pelo Pluigin
	private function define_constants(){
        define('API_PATH_LIB', __DIR__ . '/lib');
	}
	
	// Incluindo Library
	private function includes(){
        require_once(API_PATH_LIB . '/directfunction.php');
        require_once(API_PATH_LIB . '/withclass.php');
	}
    
    // Iniciando instâncias
    private function init(){
        WithClass::instance();
    }
}

// Inicialização geral da classe
$GLOBALS['demo_phpunit'] = Demo_PHPUnit::instance();