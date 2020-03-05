<?php


namespace Model;


class Answer
{
    private ?int $id;
    private string $answer;
    private string $author;
    private ?string $publication_date;
    private int $question_id;
     /**
      * Answer constructor.
      * @param $id
      * @param $answer
      * @param $author
      * @param $publication_date
      * @param $question_id
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
     * @return int
     */
    public function getQuestionId() : int
    {
        return $this->question_id;
    }

    public function setAnswer(string $answer) : void
    {
        $this->answer = $answer;
    }
}