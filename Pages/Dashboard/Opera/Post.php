<?php

namespace Pages\Dashboard\Opera;

use Helpers\Transformers\Datetransformer as Datetransformer;
use Helpers\Blueimp\CustomUploader as CustomUploader;

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

    public function create($data)
    {
        $data = Datetransformer::transform($data);
        if ($res = Model::createOpera($data)) {
            return [
                'message' => self::template(Get::$templates['default'], $res),
                'error' => null,
                'status' => 'Элемент сохранен'
            ];
        }
        return [
            'message' => null,
            'status' => 'Ошибка сохранения',
            'error' => 'Ошибка записи в БД'
        ];
    }

    public function delete($data)
    {
        if (!empty($data['id']))
            $result = Model::removeOpera($data['id']);
        if (!$result) {
            return [
                'status' => 'Ошибка удаления'
            ];
        }
        return ['response' => true];
    }

    public function update($data)
    {
        $data = Datetransformer::transform($data);
        if ($res = Model::updateOpera($data)) {
            return [
                self::template(Get::$templates['edit'], $res),
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

    public function upload($data)
    {
        $key = key($_FILES);
        $upload_handler = new CustomUploader($data['opera_id'], $key);
        $upload_handler->initialize();
        $file = $upload_handler->get_response();
        if (!empty($file[$key])) {
            foreach ($file[$key] as $k => &$v) {
                $file = json_decode(json_encode($v), true);
            }
        }
        if (!isset($file['error'])) {
            if ($file['inserted_id'] = Model::createFile($file)) {
                $file['status'] = 'Элемент сохранен';
                return [
                    'message' => self::template(Get::$templates['filesList'], $file),
                    'error' => null
                ];
            } else {
                $file['inserted_id'] = 0;
                $file['status'] = 'Ошибка сохранения данных в БД';
                return [
                    'message' => self::template(Get::$templates['filesList'], $file),
                    'error' => null
                ];
            }

        } else {
            $file['inserted_id'] = 0;
            $file['status'] = 'Ошибка сохранения документа';
            return [
                'message' => self::template(Get::$templates['filesList'], $file),
                'error' => null
            ];
        }
    }

    public function removeFile($data)
    {
        if (!empty($data)) {
            if($data['id'] == 0) {
                return [
                    'error' => null,
                    'status' => 'удаление несохраненного файла'
                ];
            }
            if ($res = Model::removeFile($data['id']) and $remove = unlink('C:\xampp\htdocs\verdi\uploads\\' . $data['category'] . '\\' . $data['filename']
                /*$_SERVER['DOCUMENT_ROOT']. '/uploads/'. $data['category'] . '/' . $data['filename']*/)) {
                return [
                    'error' => null
                ];
            } else {
                return [
                    'error' => 'ошибка удаления',
                    'status' => 'ошибка удаления'

                ];
            }
        }
    }
}
