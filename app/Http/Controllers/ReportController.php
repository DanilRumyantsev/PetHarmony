<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generateReport(Request $request)
    {
        $date = $request->input('date');

        if (! $date) {
            return response()->json(['error' => 'Не указана дата'], 400);
        }

        try {
            $date = Carbon::parse($date)->startOfDay();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Неверный формат даты'], 400);
        }

        $endDate = $date->copy()->endOfDay();

        // Получаем текущего пользователя
        $user = Auth::user();

        // Формируем результат
        $results = [
            'users' => [],
            'pets' => [],
            'health_records' => [],
            'categories' => [],
        ];

        // Добавляем текущего пользователя в список
        if ($user) {
            $results['users'][] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
            ];
        }

        // Питомцы текущего пользователя
        $results['pets'] = DB::table('pets')
            ->where('user_id', $user?->id)
            ->whereBetween('created_at', [$date, $endDate])
            ->get()
            ->map(function ($pet) {
                return [
                    'id' => $pet->id,
                    'name' => $pet->name_pet,
                    'created_at' => $pet->created_at,
                ];
            })
            ->toArray();

        // Медицинские записи текущего пользователя
        $results['health_records'] = DB::table('health_records')
            ->join('pets', 'health_records.id_pet', '=', 'pets.id')
            ->where('pets.user_id', $user?->id)
            ->whereBetween('health_records.created_at', [$date, $endDate])
            ->select('health_records.*')
            ->get()
            ->map(function ($record) {
                return [
                    'id' => $record->id,
                    'description' => $record->description,
                    'created_at' => $record->created_at,
                ];
            })
            ->toArray();

        // Категории, связанные с питомцами текущего пользователя
        $results['categories'] = DB::table('categories')
            ->join('pets', 'categories.id', '=', 'pets.category_id')
            ->where('pets.user_id', $user?->id)
            ->whereBetween('categories.created_at', [$date, $endDate])
            ->select('categories.*')
            ->distinct()
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name_category,
                    'created_at' => $category->created_at,
                ];
            })
            ->toArray();

        return response()->json([
            'date' => $date->toDateString(),
            'results' => $results,
        ]);
    }
}
