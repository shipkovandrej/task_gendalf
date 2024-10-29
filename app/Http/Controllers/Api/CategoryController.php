<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cats = $user->categories->pluck('id');

        if (request()->input('name')) {
            $str = request()->input('name');
            $categories = Category::whereIn('id', $cats)
                ->where('name', 'like', "%$str%")
                ->get();
        } else {
            $categories = Category::whereIn('id', $cats)->get();
        }

        $data = ['categories' => []];

        foreach ($categories as $cat) {
            $data['categories'][] = [
                'id' => $cat->id,
                'name' => $cat->name,
            ];
        }

        return $data;
    }

    public function show($category_id)
    {
        $category = Category::find($category_id);

        $user = auth()->user();
        $cats = $user->categories->pluck('id');

        // Проверка наличия категории
        if (!$category) {
            return response()->json([
                'error_code' => 404,
                'error_message' => 'Товар не найден',
            ], 404);
        }

        // Проверка соответствия категории
        if (!$cats->contains($category->id)) {
            return response()->json([
                'error_code' => 403,
                'error_message' => 'Доступ запрещен',
            ], 403);
        }

        $data = [
            'id' => $category->id,
            'name' => $category->name,
        ];

        return response()->json($data);
    }
}
