<?php

namespace Controller;

use League\Plates\Engine;
use Model\Question;
use Model\QuestionRepository;
use Model\Answer;
use Util\Request;
use Util\StringUtil;

/**
 * Class QuestionController
 * @package Controller
 * Gestisce tutte le operazioni relative alle domande
 */
class QuestionController{

    private Engine $template;
    private ?Request $request;

    /**
     * QuestionController constructor.
     * @param Engine $template Il template di Plates che viene creato e poi passato per il rendering grafico
     * @param Request $request Per alcuni metodi è necessario recuperare alcune informazioni
     * relative alla richiesta http che sono contenuti in questo oggetto. Dove non serve, questo parametro
     * non è presente
     */
    public function __construct(Engine $template, Request $request = null)
    {
        $this->template = $template;
        $this->request = $request;
    }

    /**
     * Metodo per mostrare la lista di tutte le domande
     * @todo Al momento per ogni domanda vengono al massimo recuperate due risposte
     * e questo valore è cablato nel codice, probabilmente sarà da rivedere
     */
    public function list()
    {
        $questions = QuestionRepository::getAllQuestions(2);
        echo $this->template->render('questionList',['questions' => $questions]);
    }

    /**
     * Mostra la forma di inserimento di una nuova domanda
     */
    public function showForm()
    {
        echo $this->template->render('questionForm');
    }

    /**
     * Mostra la forma di inserimento di una nuova risposta rispetto a una domanda.
     * L'ID della domanda viene recuperato come parametro GET dall'attributo $request
     */
    public function showAnswerForm()
    {
        $question = QuestionRepository::getQuestionByID($this->request->getGetParameters()['question_id']);
        echo $this->template->render('answerForm', ['question' => $question]);
    }

    /**
     * Mostra la lista delle risposte a una determinata domanda.
     * L'ID della domanda viene recuperato come parametro GET dall'attributo $request
     */
    public function answerList()
    {
        $question = QuestionRepository::getQuestionByID($this->request->getGetParameters()['question_id']);
        if($question === null){
            header("Location: /ask_mvc/question/list");
            return;
        }else{
            echo $this->template->render('answerList',['question' => $question, 'answers' => $question->getAnswers()]);
        }
    }

    /**
     * Aggiunge una nuova domanda
     */
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
        {
            header("location: /ask_mvc/question/list");
            return;
        }
        $question = new Question(null,$testo,$autore,date("Y-m-d H:i:s"));
        $salvata = QuestionRepository::saveQuestion($question);
        if ($salvata === true)
            header("location: /ask_mvc/question/list");
    }

    /**
     * Aggiunge una risposta a una determinata domanda.
     * L'ID della domanda viene recuperato come parametro GET dall'attributo $request
     */
    public function addAnswer()
    {
        $question_id = $this->request->getGetParameters()['question_id'];
        $pars = $this->request->getPostParameters();
        if (isset($pars['testo']) && isset($pars['autore']) && $pars['testo'] !== "" && $pars['autore'] !== "")
        {
            $testo = $pars['testo'];
            $autore = $pars['autore'];
        }
        else{
            header("location: /ask_mvc/question/answer/list?question_id=" . $this->request->getGetParameters()['question_id']);
            return;
        }
        $question = QuestionRepository::getQuestionByID($question_id);
        $question->addAnswer(new Answer(null,$testo,$autore,date("Y-m-d H:i:s"),$question_id));
        $salvata = QuestionRepository::saveQuestion($question);
        if ($salvata === true)
           header("location: /ask_mvc/question/answer/list?question_id=" . $this->request->getGetParameters()['question_id']);
        
    }

}