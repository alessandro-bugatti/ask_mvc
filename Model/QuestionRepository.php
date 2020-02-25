<?php


namespace Model;

use Util\Connection;

class QuestionRepository
{
    public function getQuestionByID(int $id) : Question
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM question WHERE id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        $row = $stmt->fetch();
        return new Question($row['id'],$row['question_text'], $row['author'], $row['publication_date']);
    }

    public function getAllQuestions() : array
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->query('SELECT * FROM question ORDER BY publication_date DESC');
        foreach ($stmt as $row)
            $result[] = new Question($row['id'],$row['question_text'], $row['author'], $row['publication_date']);
        return $result;
    }

    public function saveQuestion(Question $question) : bool
    {
        $pdo = Connection::getInstance();
        if ($question->getId() === null)
        {
            $sql = 'INSERT INTO question (question_text, author) VALUES(:question,:author)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':question' => $question->getQuestion(),
                ':author' => $question->getAuthor()
            ]);
        }
        else
        {
            $sql = 'UPDATE question SET question_text = :question, author = :author WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':question' => $question->getQuestion(),
                ':author' => $question->getAuthor(),
                ':id' => $question->getId()
            ]);
        }
        if ($stmt->rowCount() == 0)
            return false;
        return true;

    }
}