<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RestaurantRepository
{
    public function __construct
    (
        private HttpClientInterface $httpClient,
        private CacheInterface $cache
    ){}

    public function findAllRestaurants(HttpClientInterface $httpClient, CacheInterface $cache): array
    {
        return $this->cache->get('restaurants_data', function (CacheItemInterface $cacheItem) {
            $cacheItem->expiresAfter(5);

            try {
                $response = $this->httpClient->request('GET', 'https://github.com/PaulLalarme/RestaurantsPlats');
            } catch (TransportExceptionInterface $e) {
                dd($e);
            }

            return $response->toArray();
        });
    }
}