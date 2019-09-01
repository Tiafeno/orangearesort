<?php

class ogSection {
    public $content = null;
    public $classe = null;
    public function __construct( $pos = 0 ) {
        $sections = get_field('sections', 'options');
    }

    public static function getInstance($position = 0) {
        return new self($position);
    }
}