<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/quiz/quiz.php');

class Result extends Ctrl
{
    /** @Override */
    // function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }

    /** @Override */
    function getPageTitle()
    {
        return 'Résultat';
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

            // Effectuer la validation des données  
            $idUser = $_SESSION['utilisateur_id'];
            // $this->addViewArg('idUser', $_SESSION);
            $score = intval($resultat);
            $this->addViewArg('score', $score);
    
            LibQuiz::score($idUser, $score);
    
    }

    /** @Override */
    function getView()
    {
        return '/view/quiz/quiz-result.php';
    }
}

$ctrl = new Result();
$ctrl->execute();

