<?php


namespace Model;


class Question
{
    private ?int $id;
    private string $question;
    private string $author;
    private ?string $publication_date;
     /**
      * Question constructor.
      * @param $id
      * @param $question
      * @param $author
      * @param $publication_date
      */
        public function __construct($id, $question, $author, $publication_date)
        {
            $this->id = $id;
            $this->question = $question;
            $this->author = $author;
            $this->publication_date = $publication_date;
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
        return date('d/m/Y h:i:s', strtotime($this->publication_date));
    }

    /**
     * @return string
     */
    public function getAuthor() : string
    {
        return $this->author;
    }

}