<?php

namespace Controller;

use League\Plates\Engine;
use Model\QuestionRepository;

class QuestionController{

    private Engine $template;

    /**
     * QuestionController constructor.
     */
    public function __construct(Engine $template)
    {
        $this->template = $template;
    }

    public function list()
    {
        $repo = new QuestionRepository();
        $questions = $repo->getAllQuestions();
        echo $this->template->render('questionList',['questions' => $questions]);
    }

    public function showForm()
    {
        echo $this->template->render('questionForm');
    }

}