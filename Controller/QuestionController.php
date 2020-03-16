<?php

namespace Controller;

use League\Plates\Engine;
use Model\Question;
use Model\QuestionRepository;
use Model\Answer;
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
        $questions = QuestionRepository::getAllQuestions(2);
        echo $this->template->render('questionList',['questions' => $questions]);
    }

    public function showForm()
    {
        echo $this->template->render('questionForm');
    }

    public function showAnswerForm()
    {
        $question = QuestionRepository::getQuestionByID($this->request->getGetParameters()['question_id']);
        echo $this->template->render('answerForm', ['question' => $question]);
    }

    public function answerList()
    {
        $question = QuestionRepository::getQuestionByID($this->request->getGetParameters()['question_id']);
        if($question->getId()==-1)
            header("Location: /ask_mvc/question/list");
        echo $this->template->render('answerList',['question' => $question, 'answers' => $question->getAnswers()]);
    }

    public function add()
    {
        $pars = $this->request->getPostParameters();
        //Controlla sia che sia arrivati i parametri POST
        //siano che nessuno dei due sia vuoto
        if (isset($pars['testo']) && isset($pars['autore']) &&
            !empty($pars['testo']) && !empty($pars['autore']))
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

    public function addAnswer()
    {
        $pars = $this->request->getPostParameters();
        if (isset($pars['testo']) && isset($pars['autore']) && $pars['testo'] !== "" && $pars['autore'] !== "")
        {
            $testo = $pars['testo'];
            $autore = $pars['autore'];
        }
        else
            header("location: /ask_mvc/question/answer/list?question_id=" . $this->request->getGetParameters()['question_id']); 
        $answer = new Answer(null,$testo,$autore,date("Y-m-d H:i:s"),$this->request->getGetParameters()['question_id']);
        $salvata = QuestionRepository::saveAnswer($answer);
        if ($salvata === true)
            header("location: /ask_mvc/question/answer/list?question_id=" . $this->request->getGetParameters()['question_id']);
    }

}