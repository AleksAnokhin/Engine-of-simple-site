<?php
namespace Pages\Abstractions;
use Controller\Template as Template;
abstract class Dashboard extends Template {
    abstract public function response($data);
    protected function buildTemplate($template, $data = [], $scripts = [], $styles = []) {
        $header = self::template('dashboard/parts/header', $styles);
        $nav = self::template('dashboard/parts/nav', ['menu' => []]);
        $content = self::template($template, $data);
        $footer = self::template('dashboard/parts/footer', $scripts);
        return $header.$nav.$content.$footer;
    }
}