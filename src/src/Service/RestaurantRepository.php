<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RestaurantRepository
{
    public function findAll(HttpClientInterface $httpClient ,CacheItemInterface $cache): array
    {
        //return $this->$cache->get('restaurants_data', function (CacheItemInterface $cacheItem) use($httpClient){
            //$cacheItem->expiresAfter(5);

            try {
                $response = $httpClient->request('GET', 'URL');
            } catch (TransportExceptionInterface $e) {
                dd($e);
            }

            return $response->toArray();
        //});
    }
}