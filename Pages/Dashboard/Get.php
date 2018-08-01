<?php
namespace Pages\Dashboard;
class Get extends \Pages\Abstractions\Dashboard {
    public $templates = [
        'default' => 'dashboard/index'
    ];
    public function __construct() {}
    public function response($data) {

        return $this->buildTemplate($this->templates['default']);
    }
}