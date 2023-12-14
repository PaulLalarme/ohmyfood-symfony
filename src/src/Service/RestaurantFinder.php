<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Cache\CacheItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RestaurantFinder
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheInterface $cache,
        private bool $isDebug
    )
    {
    }

    public function findAll(): array
    {
        return $this->cache->get('restaurant_data', function(CacheItemInterface $cacheItem) {
            $cacheItem->expiresAfter(5);
            $response = $this->httpClient->request('GET', 'https://raw.githubusercontent.com/PaulLalarme/RestaurantsInfo/main/restaurantsList.json');

            return $response->toArray();
        });
    }
}