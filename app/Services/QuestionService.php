<?php

namespace App\Services;


use App\Repositories\QuestionRepository;

class QuestionService
{
    private $questions;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questions = $questionRepository;
    }

    /**
     * @param array $data
     * @return \App\Models\Question
     */
    public function createNewQuestion(array $data)
    {
        return $this->questions->createNewQuestion($data);
    }

    /**
     * @param int $id
     * @return \App\Models\Question|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getQuestion(int $id)
    {
        return $this->questions->getQuestion($id);
    }

    public function getAllQuestions()
    {
        return $this->questions->getAllQuestions();
    }

    public function updateQuestion(int $id, array $data)
    {
        $question = $this->questions->updateQuestion($id, $data);

        return $question;
    }
}
