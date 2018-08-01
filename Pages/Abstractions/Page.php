<?php
namespace Pages\Abstractions;
use Controller\Template as Template;
abstract class Page extends Template {
    abstract public function response($data);
}