<?php

namespace Warehouse\Model;

class User {
    public $code;

    public function __construct($code) {
        $this->code = $code;
    }
}

