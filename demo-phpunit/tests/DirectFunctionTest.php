<?php
require_once(__DIR__ . "/../../../../wp-load.php");
require_once(__DIR__ . "/../lib/directfunction.php");

use PHPUnit\Framework\TestCase;

class DirectFunctionTest extends TestCase
{
    public function testdemoPhpUnit_alter_content(){
        // Arrange
        $content = "conteúdo";
        $return_valid = "Implementação Direta - conteúdo";

        // Action
        $return_action = demoPhpUnit_alter_content($content);

        // Assert
        $this->assertEquals($return_valid, $return_action);
    }
}