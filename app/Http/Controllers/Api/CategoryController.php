<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

        $this->middleware('permission:visualizar_categorias')->only('index');
        $this->middleware('permission:visualizar_categoria')->only('show');
        $this->middleware('permission:deletar_categoria')->only('destroy');
        $this->middleware('permission:editar_categoria')->only('update');
    }

    public function index(Request $request)
    {
        return $this->categoryService->getAllCategories($request->all());
    }

    public function store(Request $request)
    {
        return $this->categoryService->newCategory($request->all());
    }

    public function show($id)
    {
        return $this->categoryService->getCategoryById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->categoryService->updateCategory($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
