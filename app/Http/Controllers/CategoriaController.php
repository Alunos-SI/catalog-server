<?php

namespace App\Http\Controllers;  
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoria;

    /**
     * Class constructor
     *
     * @param Categoria $categoria dependence injection
     */
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request the request fom page
     *
     * @return Collection
     */
    public function index(Request $request)
    {
        return CategoriaResource::collection(
            $this->categoria->getAll($request->filter)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriaRequest $request page data validated
     *
     * @return status code
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = $this->categoria->create($request->all());

        $resource = new CategoriaResource($categoria);
        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id categoria id
     *
     * @return status code
     */
    public function show(string $id)
    {
        $categoria = $this->categoria->find($id);
        if ($categoria) {
            return new CategoriaResource($categoria);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriaResource $request page data validated
     * @param string           $id      categoria id to update
     *
     * @return status code
     */
    public function update(CategoriaRequest $request, string $id)
    {
        $category = $this->categoria->find($id);
        if ($categoria) {
            $categoria->update($request->all());
            return new CategoriaResource($categoria);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id categoria id
     *
     * @return status code
     */
    public function destroy(string $id)
    {
        $categoria = $this->categoria->find($id);
        if ($categoria) {
            $categoria->delete();
            return response()->json([], 204);
        }
        return response()->json(['error' => '404 Not Found'], 404);
    }
    
    
}
