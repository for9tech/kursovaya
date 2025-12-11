<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => [
                'users_count' => User::count(),
                'admins_count' => User::where('is_admin', true)->count(),
                'products_count' => Product::count(),
            ],
            'recent_users' => User::latest()->take(5)->get(),
            'recent_products' => Product::latest()->take(5)->get(),
        ]);
    }

    public function users()
    {
        return view('admin.users', [
            'users' => User::latest()->paginate(10)
        ]);
    }

    public function toggleAdmin(User $user)
    {
        $user->update(['is_admin' => !$user->is_admin]);
        return back();
    }

    public function rentals()
    {
        return view('admin.rentals');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function products()
    {
        return view('admin.products', [
            'products' => Product::latest()->paginate(10),
            'categories' => [
                'garden' => 'Садовая техника',
                'measuring' => 'Измерительный инструмент',
                'workwear' => 'Спецодежда',
                'welders' => 'Сварочное оборудование',
                'generators' => 'Бензогенераторы',
                'grinders' => 'УШМ Болгарки',
                'perforators' => 'Перфораторы',
                'saws' => 'Электропилы'
            ]
        ]);
    }

    public function createProduct(Request $request)
    {
        // Отладка - что приходит в запросе
        \Log::info('Запрос на создание товара:', [
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'has_file' => $request->hasFile('image'),
            'file_info' => $request->hasFile('image') ? [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
            ] : null
        ]);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);

        $imagePath = 'images/tools/default.jpg';

        // Проверяем загрузку файла
        if ($request->hasFile('image')) {
            \Log::info('Файл найден, начинаем загрузку');

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $uploadPath = public_path('images/tools/' . $fileName);

            \Log::info('Параметры загрузки:', [
                'original_name' => $file->getClientOriginalName(),
                'temp_path' => $file->getPathname(),
                'target_path' => $uploadPath,
                'writable' => is_writable(public_path('images/tools'))
            ]);

            // Пробуем загрузить
            try {
                if ($file->move(public_path('images/tools'), $fileName)) {
                    $imagePath = 'images/tools/' . $fileName;
                    \Log::info('Файл успешно загружен: ' . $imagePath);
                } else {
                    \Log::error('Не удалось переместить файл');
                }
            } catch (\Exception $e) {
                \Log::error('Ошибка загрузки файла: ' . $e->getMessage());
            }
        } else {
            \Log::info('Файл не загружен или не найден в запросе');
        }

        \Log::info('Итоговый путь к изображению: ' . $imagePath);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return back()->with('success', 'Товар добавлен');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Товар удален');
    }
}
