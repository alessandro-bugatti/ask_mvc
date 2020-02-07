<?php

namespace Controller;

use Model\QuestionRepository;

class QuestionController{

    private $template;

    /**
     * QuestionController constructor.
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    public function list()
    {
        $repo = new QuestionRepository();
        $questions = $repo->getAllQuestions();
        echo $this->template->render('questionList',['questions' => $questions]);
    }

}