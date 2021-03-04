<?php

namespace App\Services;

use App\Models\Product;

class AdvisorService
{  
     /**
     * Fetches products from DB according to weather forecast 
     * 
     * @return array
     */
    public function getProduct($forecast,$i): array
    {
        $productFeature = $forecast['forecastTimestamps'][$i]['conditionCode'];
        $products = Product::where('advisor',$productFeature)->take(2)->get();
        return(
                [
                [
                'sku'   => $products[0]['sku'],
                'name'  => $products[0]['name'],
                'price' => $products[0]['price']],
                [
                'sku'   => $products[1]['sku'],
                'name'  => $products[1]['name'],
                'price' => $products[1]['price']
                ]
                ]
            );
    }

     /**
     * returns places weather forecast and  suggested product array
     * 
     * @return array
     */
    public function AdviceProduct($forecast): array
    {
        
        return (['city'=>$forecast['place']['code'],
        'recommendations' => [
            [
            'weather_forecast' => $forecast['forecastTimestamps'][0]['conditionCode'],
            'date' => $forecast['forecastTimestamps'][0]['forecastTimeUtc'],
            'product' => $this->getProduct($forecast,0)
            ],
            [
            'weather_forecast' => $forecast['forecastTimestamps'][0]['conditionCode'],
            'date' => $forecast['forecastTimestamps'][23]['forecastTimeUtc'],
            'product' => $this->getProduct($forecast,1)
            ],
            [
            'weather_forecast' => $forecast['forecastTimestamps'][0]['conditionCode'],
            'date' => $forecast['forecastTimestamps'][46]['forecastTimeUtc'],
            'product' => $this->getProduct($forecast,2)
            ]
        ]]);
    }
}
