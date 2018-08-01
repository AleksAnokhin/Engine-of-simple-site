<?php
namespace Pages\Dashboard\Composer;
use Helpers\Transformers\Datetransformer as Datetransformer;
class Post extends \Pages\Abstractions\Dashboard
{
    public function __construct()
    {
    }

    public function response($data)
    {
        $name = $data['name'];
        return $this->$name($data);
    }

    public function delete($data)
    {
        if (!empty($data['id']))
            $result = Model::removeComposer($data['id']);
        if (!$result) {
            return [
                'status' => 'Ошибка удаления'
            ];
        }
        return ['response'=>true];
    }

    public function select()
    {
        return Model::selectAll();
    }

    public function create($data)
    {
        $data = Datetransformer::transform($data);
        if ($res = Model::createComposer($data)) {
            return [
                'message' => self::template(Get::$templates['default'], $res),
                'error' => null,
                'status' => 'Элемент сохранен'
            ];
        }
        return [
            'message' => null,
            'status' => 'Ошибка сохранения',
            'error' => 'Ошибка записи в БД',
        ];
    }

    public function update($data)
    {
        $data = Datetransformer::transform($data);
        if ($res = Model::updateComposer($data)) {
            return [
                'message' => self::template(Get::$templates['edit'], $res),
                'error' => null,
                'status' => 'Изменения сохранены'
            ];
        } else {

            return [
                'message' => null,
                'status' => 'Ошибка обновления',
                'error' => 'Ошибка обновления в БД',
            ];
        }
    }
}