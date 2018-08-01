<?php
/**
 * Created by PhpStorm.
 * User: anokhin.a
 * Date: 12.07.2018
 * Time: 14:19
 */

namespace Pages\Dashboard\Opera;

use \Controller\Main as Main;
use \Helpers\Uploader\Uploader as Uploader;

class Model
{
    public function __construct()
    {
    }

    public static function selectAll()
    {
        Main::$pdo->query("SELECT operas.*, concat(composers.firstName,' ', composers.lastName) as fullName FROM operas
         LEFT JOIN composers ON operas.composer_id = composers.id ORDER BY operas.premiereYear ASC");
        return Main::$pdo->resultset();
    }

    public static function selectSingle($id)
    {
        Main::$pdo->query("SELECT operas.*, concat(composers.firstName,' ', composers.lastName) as fullName FROM operas
        LEFT JOIN composers ON operas.composer_id = composers.id WHERE composers.id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->resultset();
    }
    public static function selectName($id)
    {
        Main::$pdo->query("SELECT concat(composers.firstName, ' ', composers.lastName) as fullName FROM composers WHERE composers.id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->single();
    }
    public static function selectVideos($id)
    {
        Main::$pdo->query("SELECT count(operas_files.category) AS  videos FROM operas_files WHERE operas_id= :id AND operas_files.category = 'videos'");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->single();
    }
    public static function selectAudios($id)
    {
        Main::$pdo->query("SELECT count(operas_files.category) AS  audios FROM operas_files WHERE operas_id= :id AND operas_files.category = 'audios'");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->single();
    }

    public static function createOpera($data)
    {
        if($data['composer_id']) {
            if (!empty($data['title']) and !empty($data['composer']) and !empty($data['basedOn']) and !empty($data['librettist'])
                and !empty($data['premierePlace'])) {
                Main::$pdo->query("INSERT INTO operas (title, composer_id, basedOn, librettist, premierePlace,
        premiereYear,partituraExists, duration) 
        VALUES (:definition, :composer, :literature, :libretto, :place,
        :year, :partitura, :time)");
                Main::$pdo->bind(':definition', !empty($data['title']) ? $data['title'] : null);
                Main::$pdo->bind(':composer', !empty($data['composer_id']) ? $data['composer_id'] : null);
                Main::$pdo->bind(':literature', !empty($data['basedOn']) ? $data['basedOn'] : null);
                Main::$pdo->bind(':libretto', !empty($data['librettist']) ? $data['librettist'] : null);
                Main::$pdo->bind(':place', !empty($data['premierePlace']) ? $data['premierePlace'] : null);
                Main::$pdo->bind(':year', !empty($data['premiereYear']) ? $data['premiereYear'] : null);
                Main::$pdo->bind(':partitura', $data['partituraExists']);
                Main::$pdo->bind(':time', !empty($data['duration']) ? $data['duration'] : null);
                Main::$pdo->execute();
                return self::selectAll();
            }
        } else {
            return false;
        }
    }
    public static function removeOpera($id)
    {
        Main::$pdo->query("DELETE FROM operas WHERE id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->execute();
    }

    public static function updateOpera($data)
    {
        Main::$pdo->query("UPDATE operas SET title = :titleOf, basedOn = :literature, librettist = :libretto, 
        premierePlace = :place, premiereYear = :yearOf, partituraExists = :partituraEx, duration= :timeOf WHERE id = :id");
        Main::$pdo->bind(':titleOf', !empty($data['title']) ? $data['title'] : null);
        Main::$pdo->bind(':id', $data['id']);
        Main::$pdo->bind(':literature', !empty($data['basedOn']) ? $data['basedOn'] : null);
        Main::$pdo->bind(':libretto', !empty($data['librettist']) ? $data['librettist'] : null);
        Main::$pdo->bind(':place', !empty($data['premierePlace']) ? $data['premierePlace'] : null);
        Main::$pdo->bind(':yearOf', !empty($data['premiereYear']) ? $data['premiereYear'] : null);
        Main::$pdo->bind(':partituraEx', !empty($data['partituraExists']) ? $data['partituraExists'] : null);
        Main::$pdo->bind(':timeOf', !empty($data['duration']) ? $data['duration'] : null);
        Main::$pdo->execute();
        return $data;
    }

    public static function createFile($file)
    {
        Main::$pdo->query("INSERT INTO operas_files (operas_id,name,size_, type, url, category) 
        VALUES (:opera, :name_of, :size_of, :type_of, :url_of,:category_of)");
        Main::$pdo->bind(':opera', $file['opera_id'] ? $file['opera_id'] : 0);
        Main::$pdo->bind(':name_of',  $file['name'] );
        Main::$pdo->bind(':size_of',  $file['size'] );
        Main::$pdo->bind(':type_of',  $file['type']);
        Main::$pdo->bind(':url_of',  $file['url']  );
        Main::$pdo->bind(':category_of', $file['category'] );
        if (Main::$pdo->execute()) return Main::$pdo->lastInsertId();
        return false;
    }

    public static function removeFile($id)
    {
        Main::$pdo->query("DELETE FROM operas_files WHERE id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->execute();
    }

}