<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function show($category)
    {
        $categories = [
            'garden' => [
                'title' => 'Садовая техника',
                'description' => 'Техника для ухода за садом и участком',
                'products' => [
                    [
                        'id' => 1,
                        'name' => 'Газонокосилка бензиновая Husqvarna LC 347V',
                        'price' => '800',
                        'image' => 'images/tools/Husqvarna LC 347V.webp'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Триммер бензиновый Stihl FS 55',
                        'price' => '500',
                        'image' => 'images/tools/Stihl FS 55.webp'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Культиватор электрический Patriot Denver',
                        'price' => '600',
                        'image' => 'images/tools/Patriot Denver.webp'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Садовый измельчитель AL-KO Easy Crush MH 2800',
                        'price' => '700',
                        'image' => 'images/tools/AL-KO Easy Crush MH 2800.webp'
                    ]
                ]
            ],
            'measuring' => [
                'title' => 'Измерительный инструмент',
                'description' => 'Точные измерения для качественной работы',
                'products' => [
                    [
                        'id' => 5,
                        'name' => 'Лазерный уровень Bosch GLL 3-80 Professional',
                        'price' => '400',
                        'image' => 'images/tools/Bosch GLL 3-80 Professional.webp'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Лазерный дальномер Leica DISTO D2',
                        'price' => '300',
                        'image' => 'images/tools/Leica DISTO D2.jpg'
                    ],
                    [
                        'id' => 7,
                        'name' => 'Оптический нивелир ADA instruments Base 20',
                        'price' => '500',
                        'image' => 'images/tools/ADA Base20.webp'
                    ],
                    [
                        'id' => 8,
                        'name' => 'Тепловизор Fluke TiS20+',
                        'price' => '1200',
                        'image' => 'images/tools/Fluke TiS20.jpg'
                    ]
                ]
            ],
            'workwear' => [
                'title' => 'Спецодежда',
                'description' => 'Защитная экипировка и униформа',
                'products' => [
                    [
                        'id' => 9,
                        'name' => 'Защитный комбинезон зимний',
                        'price' => '200',
                        'image' => 'images/tools/overall.jpg'
                    ],
                    [
                        'id' => 10,
                        'name' => 'Каска строительная с подсветкой',
                        'price' => '150',
                        'image' => 'images/tools/helmet.jpg'
                    ],
                    [
                        'id' => 11,
                        'name' => 'Перчатки антивибрационные',
                        'price' => '100',
                        'image' => 'images/tools/gloves.webp'
                    ],
                    [
                        'id' => 12,
                        'name' => 'Защитные очки строительные',
                        'price' => '80',
                        'image' => 'images/tools/goggles.webp'
                    ]
                ]
            ],
            'welders' => [
                'title' => 'Сварочное оборудование',
                'description' => 'Профессиональные сварочные аппараты и комплектующие',
                'products' => [
                    [
                        'id' => 13,
                        'name' => 'Сварочный аппарат инверторный Ресанта САИ-220',
                        'price' => '600',
                        'image' => 'images/tools/welder1.webp'
                    ],
                    [
                        'id' => 14,
                        'name' => 'Сварочный полуавтомат FUBAG IRMIG 200',
                        'price' => '800',
                        'image' => 'images/tools/welder2.webp'
                    ],
                    [
                        'id' => 15,
                        'name' => 'Сварочная маска Хамелеон',
                        'price' => '200',
                        'image' => 'images/tools/welding-mask.webp'
                    ],
                    [
                        'id' => 16,
                        'name' => 'Сварочные электроды 3мм (упаковка)',
                        'price' => '50',
                        'image' => 'images/tools/electrodes.jpg'
                    ]
                ]
            ],
            'generators' => [
                'title' => 'Бензогенераторы',
                'description' => 'Источники автономного электропитания',
                'products' => [
                    [
                        'id' => 17,
                        'name' => 'Бензогенератор Huter DY6500L',
                        'price' => '900',
                        'image' => 'images/tools/generator1.jpg'
                    ],
                    [
                        'id' => 18,
                        'name' => 'Бензогенератор FUBAG BS 5500',
                        'price' => '850',
                        'image' => 'images/tools/generator2.webp'
                    ],
                    [
                        'id' => 19,
                        'name' => 'Бензогенератор Hyundai HHY 3020F',
                        'price' => '700',
                        'image' => 'images/tools/generator3.webp'
                    ],
                    [
                        'id' => 20,
                        'name' => 'Бензогенератор DDE GG3300',
                        'price' => '600',
                        'image' => 'images/tools/generator4.jpg'
                    ]
                ]
            ],
            'grinders' => [
                'title' => 'УШМ Болгарки',
                'description' => 'Углошлифовальные машины для резки и шлифовки',
                'products' => [
                    [
                        'id' => 21,
                        'name' => 'УШМ 3УБР Профессионал 20В АВ-125-42',
                        'price' => '700',
                        'image' => 'images/tools/grinder1.jpg'
                    ],
                    [
                        'id' => 22,
                        'name' => 'УШМ AEG WS13-125XE диск 125 мм',
                        'price' => '350',
                        'image' => 'images/tools/grinder2.webp'
                    ],
                    [
                        'id' => 23,
                        'name' => 'УШМ BOSCH GWS 2200-230 диск 230 мм',
                        'price' => '450',
                        'image' => 'images/tools/grinder3.webp'
                    ],
                    [
                        'id' => 24,
                        'name' => 'Полировальная шлифмашина Makita 9237CB',
                        'price' => '450',
                        'image' => 'images/tools/polisher.webp'
                    ]
                ]
            ],
            'perforators' => [
                'title' => 'Перфораторы',
                'description' => 'Мощные перфораторы для бетона и кирпича',
                'products' => [
                    [
                        'id' => 25,
                        'name' => 'Перфоратор Makita HR2470',
                        'price' => '500',
                        'image' => 'images/tools/drill1.webp'
                    ],
                    [
                        'id' => 26,
                        'name' => 'Перфоратор Bosch GBH 2-28 DFV',
                        'price' => '600',
                        'image' => 'images/tools/drill2.webp'
                    ],
                    [
                        'id' => 27,
                        'name' => 'Перфоратор DeWalt D25601K',
                        'price' => '700',
                        'image' => 'images/tools/drill3.webp'
                    ],
                    [
                        'id' => 28,
                        'name' => 'Отбойный молоток Зубр МО-30',
                        'price' => '800',
                        'image' => 'images/tools/hammer.webp'
                    ]
                ]
            ],
            'saws' => [
                'title' => 'Электропилы',
                'description' => 'Пилы для дерева, металла и других материалов',
                'products' => [
                    [
                        'id' => 29,
                        'name' => 'Цепная пила бензиновая Stihl MS 180',
                        'price' => '650',
                        'image' => 'images/tools/chainsaw.webp'
                    ],
                    [
                        'id' => 30,
                        'name' => 'Циркулярная пила Makita HS7601',
                        'price' => '400',
                        'image' => 'images/tools/circular-saw.webp'
                    ],
                    [
                        'id' => 31,
                        'name' => 'Сабельная пила Bosch PMF 350 CES',
                        'price' => '350',
                        'image' => 'images/tools/reciprocating.webp'
                    ],
                    [
                        'id' => 32,
                        'name' => 'Лобзик электрический DeWalt DW331K',
                        'price' => '300',
                        'image' => 'images/tools/jigsaw.webp'
                    ]
                ]
            ]
        ];

        if (!isset($categories[$category])) {
            abort(404);
        }

        // Получаем товары из базы данных для этой категории
        $dbProducts = Product::where('category', $category)
            ->where('is_active', true)
            ->get()
            ->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image ?: 'images/tools/default.jpg'
                ];
            })
            ->toArray();

        // Объединяем статические товары с товарами из базы данных
        $allProducts = array_merge(
            $categories[$category]['products'], // Статические товары
            $dbProducts // Товары из базы данных
        );

        return view('catalog.template', [
            'categoryTitle' => $categories[$category]['title'],
            'categoryDescription' => $categories[$category]['description'],
            'products' => $allProducts
        ]);
    }
}
