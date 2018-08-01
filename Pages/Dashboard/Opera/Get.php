<?php
namespace Pages\Dashboard\Opera;
class Get extends \Pages\Abstractions\Dashboard {
    public static $templates = [
        'default' => 'dashboard/opera/index',
        'edit' => 'dashboard/opera/edit',
        'filesList' => 'dashboard/opera/files'
    ];
    public $scripts = [
        'scripts' => ['dashboard/AutocompleteService.js','vendor/jquery.ui.widget.js','jquery.iframe-transport.js','jquery.fileupload.js', 'dashboard/operaPage.js']
    ];
    public function __construct() {}

    public function response($data) {
        preg_match('/(?P<id>[0-9]*$)/', $data['route'], $matches);
        if(!empty($matches['id']))
            return $this->buildTemplate(self::$templates['edit'], Model::selectSingle($matches['id']), $this->scripts);
        return $this->buildTemplate(self::$templates['default'], Model::selectAll(), $this->scripts);
    }
}