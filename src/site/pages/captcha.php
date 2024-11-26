<?php

#Séparation des Fonctions en rapport avec le captcha du reste du code

# Liste des questions
$liste_questions = array(
    0 => array(
        'question' => "Quelle est la couleur du cheval blanc ?",
        'reponses' => array('blanc', 'blanche', 'neige', 'clair')
    ),
    1 => array(
        'question' => "Combien font deux + quatre ?",
        'reponses' => array('6', 'six')
    )
);

# renvoie un int correspondant a l'indice d'un captcha (question et reponses)
function randomIdCaptcha(){
    $id_question_posee = rand(0, count($GLOBALS['liste_questions']) - 1);
    return $id_question_posee;
}

#renvoi la question correspondant a l'indice dans la liste des questions
function recupQuestionCaptcha($id_question_posee){
    return $GLOBALS['liste_questions'][$id_question_posee]['question'];
}


#renvoie true si la reponse de l'utilisateur fait partie des reponses attendus à la question correspondant à l'id du captcha
function captchaCorrect($idCaptcha, $reponse){
    return in_array(($reponse),$GLOBALS['liste_questions'][$idCaptcha]['reponses']);
}

