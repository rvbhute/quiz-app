<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    private $questions;

    /**
     * Create a new controller instance.
     *
     * @param QuestionService $questionService
     */
    public function __construct(QuestionService $questionService)
    {
        $this->questions = $questionService;

        $this->middleware('auth');
    }

    function showNewQuestionForm()
    {
        return view('questions.form');
    }

    function saveNewQuestion(Request $request)
    {
        list($data, $validator) = $this->validateQuestion($request);

        if ($validator->fails()) {
            return redirect('questions/new')
                ->withErrors($validator)
                ->withInput();
        }

        $question = $this->questions->createNewQuestion($data);

        return redirect("questions/{$question->id}");
    }

    public function viewQuestion(int $id)
    {
        $question = $this->questions->getQuestion($id);

        return view('questions.single', ['question' => $question]);
    }

    public function index()
    {
        $questions = $this->questions->getAllQuestions();

        return view('questions.index', ['questions' => $questions]);
    }

    public function viewQuestionEditForm(int $id)
    {
        $question = $this->questions->getQuestion($id);

        return view('questions.edit', ['question' => $question]);
    }

    public function saveQuestion(int $id, Request $request)
    {
        list($data, $validator) = $this->validateQuestion($request);

        if ($validator->fails()) {
            return redirect("questions/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $updatedQuestion = $this->questions->updateQuestion($id, $data);

        if ($updatedQuestion) {
            return redirect("questions/{$id}");
        } else {
            return redirect("questions/{$id}/edit");
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validateQuestion(Request $request): array
    {
        $data = [
            'question' => $request->input('question'),
            'correct_answer' => $request->input('correct_answer'),
            'answers' => preg_split("/\r\n|\n|\r/", $request->input('answers'))
        ];

        $validator = Validator::make($data, [
            'question' => 'required|string',
            'answers' => 'required',
            'correct_answer' => 'required|string'
        ]);

        $validator->after(function ($validator) use ($data) {
            if (!in_array($data['correct_answer'], $data['answers'])) {
                $validator->errors()->add('correct_answer', 'Correct answer not listed in options.');
            }
        });

        return [$data, $validator];
    }
}
