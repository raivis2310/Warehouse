<?php

namespace Warehouse\LogIn;

use Carbon\Carbon;
class Logger {
    private $logs = [];

    public function log($message) {
        $timestamp = date(Carbon::now()->toDateTimeString());
        $this->logs[] = "[$timestamp] $message";
    }

    public function getLogs() {
        return $this->logs;
    }
}
