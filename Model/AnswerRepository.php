<?php


namespace Model;

use Util\Connection;

class AnswerRepository
{
    private function __construct()
    {
    }

    public static function getAnswerByID(int $id) : Answer
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM answer WHERE id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        $row = $stmt->fetch();
        return new Answer($row['id'],$row['answer_text'], $row['author'], $row['publication_date'], $row['id_question']);
    }

    public static function getAllAnswers() : array
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->query('SELECT * FROM answer ORDER BY publication_date DESC');
        foreach ($stmt as $row)
            $result[] = new Answer($row['id'],$row['answer_text'], $row['author'], $row['publication_date'], $row['id_question']);
        return $result;
    }

    public static function getAnswersByQuestionId(int $question_id) : array
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM answer WHERE id_question = :question_id ORDER BY publication_date DESC');
        $stmt->execute([
            'question_id' => $question_id
        ]);
        foreach ($stmt as $row)
            $result[] = new Answer($row['id'],$row['answer_text'], $row['author'], $row['publication_date'], $row['id_question']);
        return $result;
    }

    public static function saveAnswer(Answer $answer) : bool
    {
        $pdo = Connection::getInstance();
        if ($answer->getId() === null)
        {
            $sql = 'INSERT INTO answer (answer_text, author, id_question) VALUES(:answer,:author,:id_question)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':answer' => $answer->getAnswer(),
                ':author' => $answer->getAuthor(),
                ':id_question' => $answer->getQuestionId()
            ]);
        }
        else
        {
            $sql = 'UPDATE answer SET answer_text = :answer, author = :author WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':answer' => $answer->getAnswer(),
                ':author' => $answer->getAuthor(),
                ':id' => $answer->getId()
            ]);
        }
        if ($stmt->rowCount() == 0)
            return false;
        return true;

    }
}