<?php

namespace Controller;

use League\Plates\Engine;
use Model\Question;
use Model\QuestionRepository;
use Util\Request;

class QuestionController{

    private Engine $template;
    private ?Request $request;

    /**
     * QuestionController constructor.
     */
    public function __construct(Engine $template, Request $request = null)
    {
        $this->template = $template;
        $this->request = $request;
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