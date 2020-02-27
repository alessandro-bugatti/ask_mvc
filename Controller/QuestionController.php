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
        $questions = QuestionRepository::getAllQuestions();
        echo $this->template->render('questionList',['questions' => $questions]);
    }

    public function showForm()
    {
        echo $this->template->render('questionForm');
    }

    public function add()
    {
        $pars = $this->request->getPostParameters();
        if (isset($pars['testo']) && isset($pars['autore']))
        {
            $testo = $pars['testo'];
            $autore = $pars['autore'];
        }
        else
            header("location: /ask_mvc/question/list");
        $question = new Question(null,$testo,$autore,date("Y-m-d H:i:s"));
        $salvata = QuestionRepository::saveQuestion($question);
        if ($salvata === true)
            header("location: /ask_mvc/question/list");
    }

}