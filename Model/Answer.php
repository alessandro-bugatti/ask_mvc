<?php


namespace Model;

use Util\StringUtil;

/**
 * Class Answer
 * @package Model
 * Rappresenta una singola risposta, esiste solo all'interno di una domanda
 * @todo Da investigare se davvero serva il question_id, modificando poco se ne potrebbe fare a meno
 */
class Answer
{
    private ?int $id;
    private string $answer;
    private string $author;
    private ?string $publication_date;
    private int $question_id; ///
     /**
      * Answer constructor.
      * @param $id ID della risposta all'interno del DB
      * @param $answer Testo
      * @param $author Autore
      * @param $publication_date Timestamp
      * @param $question_id Chiave esterna che fa riferimento alla chiave della domanda a cui è collegata
      */
        public function __construct($id, $answer, $author, $publication_date, $question_id)
        {
            $this->id = $id;
            $this->answer = $answer;
            $this->author = $author;
            $this->publication_date = $publication_date;
            $this->question_id = $question_id;
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
    public function getAnswer() : string
    {
        return $this->answer;
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
     * @return int
     */
    public function getQuestionId() : int
    {
        return $this->question_id;
    }

    /**
     * @param int $limit : the string length limit
     * 
     * @return string a short answer limited by the $limit param
     */
    public function getShortAnswer($limit) : string
    {
        return StringUtil::substr_and_append($this->answer, $limit, " ...");
    }
}