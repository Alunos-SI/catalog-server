<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Http\Requests\ProdutoRequest; 
use App\Http\Resources\ProdutoResource; 
use App\Models\Produto;

class ProdutoController extends Controller
{
    private $produto;

    /**
     * Class constructor
     *
     * @param Produto $produto dependence injection
     */
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ProdutoResource::collection(
            $this->produto->getAll($request->filter)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $produto = $this->produto->create($request->all());

        $resource = new ProdutoResource($produto);

        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $produto = $this->produto->find($id);
        if ($produto) {
            return new ProdutoResource($produto);
        }

        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function showWithComments(String $id)
    {
        $produto = $this->produto->with('comentario')->find($id);
        if ($produto) {
            return new ProdutoResource($produto);
        }

        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        $produto = $this->produto->find($id);
        if ($produto) {
            $produto->update($request->all());

            return new ProdutoResource($produto);
        }

        return response()->json(['error' => '404 Not Found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = $this->produto->find($id);
        if ($produto) {
            $produto->delete();

            return response()->json([], 204);
        }

        return response()->json(['error' => '404 Not Found'], 404);
    }
}
