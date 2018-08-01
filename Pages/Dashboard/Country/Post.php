<?php
namespace Pages\Dashboard\Country;
class Post extends \Pages\Abstractions\Dashboard {
    public function __construct() {}
    public function response($data) {
        $name = $data['name'];
        return $this->$name($data);
	}
    public function select() {
        return Model::selectAll();
    }
    public function create($data) {
        if(!empty($data['title']) && $res = Model::createCountry($data['title'])) {
            return [
                'message' => self::template(Get::$templates['default'], $res),
                'error' => null,
                'status' => 'Сохранение выполнено'
                ];
        } else {
            return [
                'error' => 'Ошибка сохранения страны в базе данных',
                'status' => 'Страна не сохранена'
            ];
        }
    }
    public function delete($data) {
        if(!empty($data['id']))
            $response = Model::removeCountry($data['id']);
        if($response) {
            return [
                'error' => null
                ];
        } else {
            return [
                'error' => true,
                'status' => 'Ошибка удаления страны в базе даннных'
            ];
        }
    }
}