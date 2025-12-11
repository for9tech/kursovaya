<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'category',
        'description',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Получить название категории на русском
     */
    public function getCategoryNameAttribute()
    {
        $categories = [
            'garden' => 'Садовая техника',
            'measuring' => 'Измерительный инструмент',
            'workwear' => 'Спецодежда',
            'welders' => 'Сварочное оборудование',
            'generators' => 'Бензогенераторы',
            'grinders' => 'УШМ Болгарки',
            'perforators' => 'Перфораторы',
            'saws' => 'Электропилы'
        ];

        return $categories[$this->category] ?? $this->category;
    }

    /**
     * Получить URL изображения
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        // Заглушка если нет изображения
        return asset('images/tools/default.jpg');
    }

    /**
     * Scope для активных товаров
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope для товаров по категории
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
