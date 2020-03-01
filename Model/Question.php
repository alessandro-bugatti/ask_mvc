<?php


namespace Model;


class Question
{
    private ?int $id;
    private string $question;
    private string $author;
    private ?string $publication_date;
    private ?array $answers;
     /**
      * Question constructor.
      * @param $id
      * @param $question
      * @param $author
      * @param $publication_date
      */
        public function __construct($id, $question, $author, $publication_date, $answers = null)
        {
            $this->id = $id;
            $this->question = $question;
            $this->author = $author;
            $this->publication_date = $publication_date;
            $this->answers = $answers;
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
     * @return string
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

    public function addAnswer(Answer $answer) : void
    {
        if ($this->answers === null)
            $this->answers = array();
        $this->answers[] = $answer;
    }

}