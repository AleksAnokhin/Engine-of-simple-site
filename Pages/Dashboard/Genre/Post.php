<?php
namespace Pages\Dashboard\Genre;
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
        if(!empty($data['title']) && $res = Model::createGenre($data['title']))
        {
            return [
                'message' => self::template(Get::$templates['default'], $res),
                'status' => 'Сохранеие нового жанра прошло успешно',
                'error' => null
            ];
        } else {
            return [
                'status' => 'Не удалось сохранить новый жанр',
                'error' => 'Ошибка сохранения нового жанра в базе данных'
            ];
        }
    }
    public function delete($data) {
        if(!empty($data['id']))
            $response =  Model::removeGenre($data['id']);
        if($response) {
            return [
                'error' => null
            ];
        } else {
            return [
                'error' => true,
                'status' => 'Ошибка удаления жанра в базе даннных'
            ];
        }
		return false;
    }
}