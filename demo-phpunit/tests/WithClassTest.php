<?php
require_once(__DIR__ . "/../lib/withclass.php");

use PHPUnit\Framework\TestCase;

class WithClassTest extends TestCase
{
    public function testAlterContent(){
        // Arrange
        $content = "conteúdo";
        $return_valid = "Implementação por Classe - conteúdo";

        // Action
        $return_action = WithClass::alter_content($content);

        // Assert
        $this->assertEquals($return_valid, $return_action);
    }
}