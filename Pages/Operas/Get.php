<?php

namespace Pages\Operas;

use Helpers\Transformers\Datatransformer;
use Pages\Dashboard\Opera\Model as Model;

class Get extends \Pages\Abstractions\Page
{

    public static $templates = [
        'default' => 'Operas/index',
        'single' => 'Operas/single'
    ];

    public function __construct()
    {
    }

    public $scripts = [];
    public static $name = 'operas';

    public function response($data)
    {
        preg_match('/(?P<id>[0-9]*$)/', $data['route'], $matches);
        if (!empty($matches['id'])) {
            $content = ['body' =>
                            [
                                'main' => Model::selectSingle($matches['id']),
                                'composer' => Model::selectName($matches['id'])
                            ]
                        ];
            $new_content = ['body' =>
                                [
                                    'main' => Datatransformer::transform($content['body']['main']),
                                    'composer' => Model::selectName($matches['id'])
                                ]
                            ];
            return $this->fullTemplate(self::$templates['single'], $new_content, $this->scripts);
        } else {
            $content = ['body' => Model::selectAll()];
            $new_content = ['body' => Datatransformer::transform($content['body'])];
            return $this->fullTemplate(self::$templates['default'], $new_content, $this->scripts);
        }
    }
}
