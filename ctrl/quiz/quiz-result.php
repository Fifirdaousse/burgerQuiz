<?php 
// var_dump();
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/quiz/quiz.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

class Result extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Résultat';
    }

    function getDescription()
    {
        return 'Résultats du quiz';
    }

    /** @Override */
    function do()
    {
        function calculScore($reponse)
        {
            $score = 0;

            foreach($reponse as $key => $value) {
                if ($value == '1') {
                $score++;
                }
            }

            $resultat = (intval($score) / 6) * 100;

            return $resultat;
        }

        $resultat = calculScore($_POST);

        if ($resultat >= 50) {
            $message = 'Vous vous débrouillez continuez comme ça ! ';
        } else {
            $message = 'Vous pouvez le faire, continuez ainsi ! ';
        }
        $this->addViewArg('message', $message);
 
            $idUser = $_SESSION['user']['id'];
            $score = intval($resultat);
            $this->addViewArg('score', $score);

            LibQuiz::score($score, $idUser);
    }

    /** @Override */
    function getView()
    {
        return '/view/quiz/quiz-result.php';
    }
}

$ctrl = new Result();
$ctrl->execute();