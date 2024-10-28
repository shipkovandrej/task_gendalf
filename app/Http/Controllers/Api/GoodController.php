<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GoodController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cats = $user->categories->pluck('id');

        if (request()->input('name')) {
            $str = request()->input('name');
            $goods = Good::whereIn('category_id', $cats)
                ->where('name', 'like', "%$str%")
                ->get(['id', 'name', 'desc', 'price', 'category_id']);
        } else {
            $goods = Good::with('category')->whereIn('category_id', $cats)->get();
        }

        foreach ($goods as $good) {
            $data['items'][] = [
                'id' => $good->id,
                'name' => $good->name,
                'preview_text' => $good->desc,
                'price' => $good->price,
                'category' => $good->category->name,
            ];
        }

        return $data;
    }

    public function show($item_id)
    {
        $good = Good::find($item_id);

        $user = auth()->user();
        $cats = $user->categories->pluck('id');

        // Проверка наличия товара
        if (!$good) {
            return response()->json([
                'error_code' => 404,
                'error_message' => 'Товар не найден',
            ], 404);
        }

        // Проверка соответствия категории
        if (!$cats->contains($good->category_id)) {
            return response()->json([
                'error_code' => 403,
                'error_message' => 'Доступ запрещен',
            ], 403);
        }

        $data = [
            'id' => $good->id,
            'name' => $good->name,
            'preview_text' => $good->desc,
            'price' => $good->price,
            'category' => $good->category->name,
        ];

        return response()->json($data);

    }

}
