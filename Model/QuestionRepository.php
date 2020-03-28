<?php


namespace Model;

use Util\Connection;

class QuestionRepository
{
    private function __construct()
    {
    }

    public static function getQuestionByID(int $id) : ?Question
    {
        $pdo = Connection::getInstance();
        $answers = array();
        $stmt = $pdo->prepare('SELECT * FROM answer WHERE id_question = :id');
        $stmt->execute([
            'id' => $id
        ]);
        while($row = $stmt->fetch()){
            $answers[] = new Answer($row['id'],$row['answer_text'], $row['author'], $row['publication_date'], $row['id_question']);
        }
        $stmt = $pdo->prepare('SELECT * FROM question WHERE id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        if($row = $stmt->fetch())
            return new Question($row['id'],$row['question_text'], $row['author'], $row['publication_date'], $answers);
        return null;
    }

    public static function getAllQuestions(int $answersLimit = 0) : array
    {
        $pdo = Connection::getInstance();
        $stmt = $pdo->query('SELECT * FROM question ORDER BY publication_date DESC');
        foreach ($stmt as $row)
            $result[$row['id']] = new Question($row['id'],$row['question_text'], $row['author'], $row['publication_date']);
        if ($answersLimit > 0){
            $answers = array();
            $stmt = $pdo->prepare('SELECT question_id, answer_id, A.answer_text, A.author, A.publication_date
                FROM (
                    SELECT question.id  AS question_id, answer.id AS answer_id, answer_text, answer.author, answer.publication_date, 
                    (RANK() OVER (PARTITION BY question.id ORDER BY answer.publication_date DESC)) AS ordine 
                    FROM question, answer 
                    WHERE question.id = answer.id_question)
                AS A
                WHERE ordine <= :answersLimit');
            $stmt->execute([
                'answersLimit' => $answersLimit
            ]);
            while($row = $stmt->fetch()){
                $answers[] = new Answer($row['answer_id'],$row['answer_text'], $row['author'], $row['publication_date'], $row['question_id']);
            }
            foreach($answers as $answer){
                $result[$answer->getQuestionID()]->addAnswer($answer);
            }
        }
        return $result;
    }

    public static function saveQuestion(Question $question) : bool
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