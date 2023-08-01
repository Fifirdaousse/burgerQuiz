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
    static function multyRandomNumber($min, $max){
        $arr = [];
   
        for ($i = 0 ; $i <= 6; $i++){
            $randomNumber = rand($min, $max);
            $arr[] = $randomNumber;
        }
   
        return $arr;
   }

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
     * Sélectionne un Article d'après son identifiant.
     * 
     * @param int $id Identifiant de l'Article.
     * 
     * @return mixed Tableau associatif de l'Article s'il existe, ou 'false'.
     */
    static function score($idUser, $score)
    {
        // self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'INSERT INTO score (idUser, score) VALUES';
        $query .= ' (:idUser, :score)';

        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':score', $score);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // self::log()->info(__FUNCTION__, ['result' => $result]);

        return $result;
    }

}