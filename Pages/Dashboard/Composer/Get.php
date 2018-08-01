<?php
namespace Pages\Dashboard\Composer;
class Get extends \Pages\Abstractions\Dashboard {
    public static $templates = [
        'default' => 'dashboard/composer/index',
        'new' => 'dashboard/composer/new',
        'edit' => 'dashboard/composer/edit'
    ];
    public $scripts = [
        'scripts' => ['dashboard/composerPage.js', 'dashboard/AutocompleteService.js']
    ];
    public static $name = 'dashboard';
    public function __construct() {}
    public function response($data) {
        preg_match('/(?P<id>[0-9]*$)/', $data['route'], $matches);
        if(!empty($matches['id']))
            return $this->buildTemplate(self::$templates['edit'], Model::selectSingle($matches['id']), $this->scripts);
        return $this->buildTemplate(self::$templates['default'], Model::selectAll(), $this->scripts);
    }
}