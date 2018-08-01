<?php
namespace Pages\Dashboard\Country;
class Get extends \Pages\Abstractions\Dashboard {
    public static $templates = [
        'default' => 'dashboard/country/index'
    ];
    public $scripts = [];
    public function __construct() {}
    public function response($data) {
        return $this->buildTemplate(self::$templates['default'], Model::selectAll(), $this->scripts);
    }
}