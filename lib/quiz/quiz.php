<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

// use Monolog\Logger;

/** Bibliothèque de fonctions dédiées aux Quiz. */
class LibQuiz
{
    /** Fournit une fonction de log. */
    // static function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    //Générer 6 nombres aléatoires et les stock dans un tableau
    static function multyRandomNumber($min, $max)
    {
        $arr = [];

        for ($i = 0; $i <= 6; $i++) {
            $randomNumber = rand($min, $max);
            $arr[] = $randomNumber;
        }

        return $arr;
    }

    //Recupere les questions ainsi que les propositions associés
    static function getQuestion($numbers)
    {
        // self::log()->info(__FUNCTION__, ['idUser' => $idUser, 'title' => $title, 'description' => $description, 'text' => $text, 'picture' => $picture]);

        // Prépare la requête
        $query = "SELECT question.numero, question.intitule AS 'intituleQuestion', proposition.intitule 
                    AS 'intituleProposition', proposition.lettre, proposition.estBonneReponse ";
        $query .= 'FROM question ';
        $query .= 'LEFT JOIN proposition on question.id = proposition.idQuestion ';
        $query .= 'WHERE question.id IN(' . $numbers . ')';
        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);


        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $results =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        $questions = [];

        foreach ($results as $result) {
            $questions[$result['numero']]['intituleQuestion'] = $result['intituleQuestion'];
            $questions[$result['numero']]['propositions'][] = [
                'intitule' => $result['intituleProposition'],
                'lettre' => $result['lettre'],
                'estBonneReponse' => $result['estBonneReponse']
            ];
        }

        return $questions;
    }

    /**
     * Stock le score d'un utilisateur 
     * En fonction de son id
     */
    static function score($score, $idUser)
    {
        // self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'INSERT INTO score (score, idUser) VALUES';
        $query .= '(:score, :idUser)';

        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':score', $score);
        $stmt->bindParam(':idUser', $idUser);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // self::log()->info(__FUNCTION__, ['result' => $result]);

        return $successOrFailure;
    }

    static function  readAllScore()
    {
        // self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'SELECT score, nom, prenom ';
        $query .= 'FROM utilisateur AS USER ';
        $query .= 'JOIN score ON score.idUser = USER.id';
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
