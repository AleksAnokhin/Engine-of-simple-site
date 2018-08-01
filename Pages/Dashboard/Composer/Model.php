<?php

namespace Pages\Dashboard\Composer;

use \Controller\Main as Main;

class Model
{
    public function __construct()
    {
    }

    public static function createComposer($data)
    {
        if (empty($data['firstName']) && empty($data['lastName'])) return false;
        if (!empty($data['genre']) && empty($data['genre_id'])) $data['genre_id'] = self::createGenre($data['genre']);
        if (!empty($data['country']) && empty($data['country_id'])) $data['country_id'] = self::createCountry($data['country']);
        Main::$pdo->query("INSERT INTO composers (firstName, lastName, country_id, genre_id, deathDate,
        birthDate, bio,fullName) VALUES (:firstName,:lastName,:country_id, :genre_id, :deathDate, :birthDate, :bio,:fullName)");
        Main::$pdo->bind(':firstName', !empty($data['firstName']) ? $data['firstName'] : null);
        Main::$pdo->bind(':lastName', !empty($data['lastName']) ? $data['lastName'] : null);
        Main::$pdo->bind(':country_id', !empty($data['country_id']) ? $data['country_id'] : null);
        Main::$pdo->bind(':genre_id', !empty($data['genre_id']) ? $data['genre_id'] : null);
        Main::$pdo->bind(':deathDate', !empty($data['deathDate']) ? $data['deathDate'] : null);
        Main::$pdo->bind(':birthDate', !empty($data['birthDate']) ? $data['birthDate'] : null);
        Main::$pdo->bind(':bio', !empty($data['bio']) ? $data['bio'] : null);
        Main::$pdo->bind(':fullName',$data['firstName'] . ' ' . $data['lastName']);
        Main::$pdo->execute();
        return self::selectAll();
    }

    public static function updateComposer($data)
    {
        if (empty($data['firstName']) && empty($data['lastName']) && empty($data['id'])) return false;
        if (!empty($data['genre']) && empty($data['genre_id'])) $data['genre_id'] = self::createGenre($data['genre']);
        if (!empty($data['country']) && empty($data['country_id'])) $data['country_id'] = self::createCountry($data['country']);
        Main::$pdo->query("UPDATE composers SET firstName = :firstName, lastName = :lastName, country_id = :country_id, genre_id = :genre_id, 
        birthDate = :birth, deathDate = :death, bio = :bio, fullName= :fullName WHERE id = :id");
        Main::$pdo->bind(':firstName', !empty($data['firstName']) ? $data['firstName'] : null);
        Main::$pdo->bind(':lastName', !empty($data['lastName']) ? $data['lastName'] : null);
        Main::$pdo->bind(':id', $data['id']);
        Main::$pdo->bind(':country_id', !empty($data['country_id']) ? $data['country_id'] : null);
        Main::$pdo->bind(':genre_id', !empty($data['genre_id']) ? $data['genre_id'] : null);
        Main::$pdo->bind(':birth', !empty($data['birthDate']) ? $data['birthDate'] : null);
        Main::$pdo->bind(':death', !empty($data['deathDate']) ? $data['deathDate'] : null);
        Main::$pdo->bind(':bio', !empty($data['bio']) ? $data['bio'] : null);
        Main::$pdo->bind(':fullName', $data['firstName'] . $data['lastName']);
        Main::$pdo->execute();
        return $data;
    }

    public static function createGenre($genreTitle)
    {
        Main::$pdo->query("INSERT INTO genres (title) VALUES (:title)");
        Main::$pdo->bind(':title', $genreTitle);
        Main::$pdo->execute();
        return Main::$pdo->lastInsertId();
    }

    public static function createCountry($countryTitle)
    {
        Main::$pdo->query("INSERT INTO countries (title) VALUES (:title)");
        Main::$pdo->bind(':title', $countryTitle);
        Main::$pdo->execute();
        return Main::$pdo->lastInsertId();
    }

    public static function selectAll()
    {
        Main::$pdo->query("SELECT composers.*, concat(composers.firstName,' ', composers.lastName) as title, countries.title as country, genres.title as genre, genres.id as genre_id, operas.title as opera FROM composers
 LEFT JOIN operas ON operas.composer_id = composers.id LEFT JOIN countries ON countries.id = composers.country_id LEFT JOIN genres ON genres.id = composers.genre_id");
        return Main::$pdo->resultset();
    }

    public static function selectSingle($id)
    {
        Main::$pdo->query("SELECT composers.*, countries.title as country, genres.title as genre FROM composers LEFT JOIN countries ON countries.id = composers.country_id LEFT JOIN genres ON genres.id = composers.genre_id WHERE composers.id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->single();
    }

    public static function removeComposer($id)
    {
        Main::$pdo->query("DELETE FROM composers WHERE id = :id");
        Main::$pdo->bind(':id', $id);
        return Main::$pdo->execute();
    }
}