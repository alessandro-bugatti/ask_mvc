<?php


namespace Model;

/**
 * Class Question
 * @package Model
 * Rappresenta una singola domanda
 */
class Question
{
    private ?int $id;
    private string $question;
    private string $author;
    private ?string $publication_date;
    private ?array $answers; //contiene le risposte già presenti nel DB
    private ?Answer $newer_answer; //contiene una nuova risposta non ancora riversata nel DB
     /**
      * Question constructor.
      * @param $id
      * @param $question Il testo della domanda
      * @param $author
      * @param $publication_date
      * @param array $answers contiene le risposte già presenti nel DB
      * @param null $newer_answer contiene una nuova risposta non ancora riversata nel DB
      */
        public function __construct($id, $question, $author, $publication_date, $answers = array(), $newer_answer = null)
        {
            $this->id = $id;
            $this->question = $question;
            $this->author = $author;
            $this->publication_date = $publication_date;
            $this->answers = $answers;
            $this->newer_answer = $newer_answer;
        }

    /**
     * @return int
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getQuestion() : string
    {
        return $this->question;
    }

    /**
     * @return string nel formato d/m/Y h:i:s a
     */
    public function getPublicationDate() : ?string
    {
        if ($this->publication_date=== null)
            return null;
        return date('d/m/Y h:i:s a', strtotime($this->publication_date));
    }

    /**
     * @return string
     */
    public function getAuthor() : string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getAnswers() : ?array
    {
        return $this->answers;
    }

    //da usare solo quando si caricano risposte dal database
    public function loadAnswer(Answer $answer) : void
    {
    $this->answers[] = $answer;
    }

    //da usare quando si aggiunge una nuova risposta
    public function addAnswer(Answer $answer) : void
    {
        $this->newer_answer = $answer;
    }

    /**
     * @return Answer è una domanda presente in memoria ma non ancora salvata nel DB
     */
    public function getNewerAnswer() : ?Answer
    {
        return $this->newer_answer;
    }

    /**
     * Pulisce un'eventuale risposta presente, da chiamare dopo averla riversata nel DB
     */
    public function newerAnswerGotSaved() :void
    {
        $this->newer_answer = null;
    }

}