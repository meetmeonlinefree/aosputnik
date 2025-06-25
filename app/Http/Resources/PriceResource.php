<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    public function toArray($request)
    {
        // Получаем запрошенную валюту
        $currency = strtoupper($request->query('currency', 'RUB'));

        // Курсы относительно рубля
        $rates = [
            'RUB' => 1,
            'USD' => 90,
            'EUR' => 100,
        ];

        // Символ валюты и формат
        $symbols = [
            'RUB' => '₽',
            'USD' => '$',
            'EUR' => '€',
        ];

        $rate = $rates[$currency] ?? 1;
        $symbol = $symbols[$currency] ?? '';

        // Конвертация и форматирование
        $converted = $this->price / $rate;

        switch ($currency) {
            case 'USD':
            case 'EUR':
                // два знака после запятой, символ перед числом
                $formatted = $symbol . number_format($converted, 2, '.', '');
                break;
            default:
                // рубли: разделитель тысяч пробелом, ₽ после числа
                $formatted = number_format($converted, 0, '.', ' ') . " $symbol";
        }

        return [
            'id'    => $this->id,
            'title' => $this->title,
            'price' => $formatted,
        ];
    }
}
