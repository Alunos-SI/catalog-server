<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComentarioRequest;
use App\Http\Resources\ComentarioResource;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    private $comentario;

    /**
     * Class constructor
     *
     * @param Comentario $comentario dependence injection
     */
    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ComentarioResource::collection(
            $this->comentario->getAll($request->filter)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComentarioRequest $request)
    {
        $comentario = $this->comentario->create($request->all());

        $resource = new comentarioResource($comentario);
        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comentario = $this->comentario->find($id);
        if ($comentario) {
            return new comentarioResource($comentario);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(comentarioRequest $request, string $id)
    {
        $comentario = $this->comentario->find($id);
        if ($comentario) {
            $comentario->update($request->all());
            return new comentarioResource($comentario);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comentario = $this->comentario->find($id);
        if ($comentario) {
            $comentario->delete();
            return response()->json([], 204);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }
}
