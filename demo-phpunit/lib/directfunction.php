<?php

function demoPhpUnit_alter_content($content){

    $content = "Implementação Direta - " . $content;

    return $content;
}
add_filter( 'the_content', 'demoPhpUnit_alter_content', 20 );