<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $currency = strtoupper($request->input('currency', 'RUB'));
        $price = $this->price;
        $formattedPrice = '';

        switch ($currency) {
            case 'USD':
                $converted = $price / 90;
                $formattedPrice = '$' . number_format($converted, 2, '.', '');
                break;
            case 'EUR':
                $converted = $price / 100;
                $formattedPrice = '€' . number_format($converted, 2, '.', '');
                break;
            default:
                $formattedPrice = number_format($price, 0, '', ' ') . ' ₽';
                break;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $formattedPrice,
            'currency' => $currency,
        ];
    }
}
