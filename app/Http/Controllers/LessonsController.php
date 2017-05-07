<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

class LessonsController extends ApiController
{
    /**
     * @var LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic', ['only' => ['store', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return $this->response([
            'code' => 200,
            'status' => 'success',
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->get('title') || !$request->get('body')) {
            return $this->setStatusCode(422)->responseError('validate Error');
        }

        $lesson = Lesson::create($request->all());

        return $this->response([
            'code' => 201,
            'status' => 'success',
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return $this->responseNotFound();
        }

        return $this->response([
            'code' => 200,
            'status' => 'success',
            'data' => $this->lessonTransformer->transform($lesson->toArray())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function transformCollection($lessons)
    {
        return array_map([$this, 'transform'], $lessons->toArray());
    }

    private function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'isFree' => (boolean)$lesson['free'],
        ];
    }

}
