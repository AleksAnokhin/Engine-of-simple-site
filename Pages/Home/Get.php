<?php
namespace Pages\Home;
class Get extends \Pages\Abstractions\Page {
    public $templates = [
        'default' => 'home/index'
    ];
    public function __construct() {}
    public function response($data) {
        $content = [
            'body' => [
                'composers' => \Pages\Dashboard\Composer\Model::selectAll(),
                'countries' => \Pages\Dashboard\Country\Model::selectAll(),
                'genres' => \Pages\Dashboard\Genre\Model::selectAll(),
            ]
        ];
        return self::fullTemplate($this->templates['default'], $content);
    }
}