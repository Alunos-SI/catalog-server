<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    private $comment;

    /**
     * Class constructor
     *
     * @param Comment $comment dependence injection
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return CommentResource::collection(
            $this->comment->getAll($request->filter)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = $this->comment->create($request->all());

        $resource = new CommentResource($comment);
        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = $this->comment->find($id);
        if ($comment) {
            return new CommentResource($comment);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $comment = $this->comment->find($id);
        if ($comment) {
            $comment->update($request->all());
            return new CommentResource($comment);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = $this->comment->find($id);
        if ($comment) {
            $comment->delete();
            return response()->json([], 204);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }
}
