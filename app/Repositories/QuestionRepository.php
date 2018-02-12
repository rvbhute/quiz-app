<?php

namespace App\Repositories;


use App\Models\Question;

class QuestionRepository
{
    private $questions;

    public function __construct(Question $question)
    {
        $this->questions  = $question;
    }

    /**
     * @param array $data
     * @return Question
     */
    public function createNewQuestion(array $data)
    {
        $newQuestion = $this->questions->create($data);

        return $this->getQuestion($newQuestion->id);
    }

    /**
     * @param int $id
     * @return Question|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getQuestion(int $id)
    {
        return $this->questions->findOrFail($id);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllQuestions()
    {
        return $this->questions->paginate();
    }

    public function updateQuestion(int $id, array $data)
    {
        $question = $this->getQuestion($id);

        $question->fill($data);
        $question->save();

        return $question;

    }
}
