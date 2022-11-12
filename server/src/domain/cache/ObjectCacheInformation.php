<?php

namespace HahneSoftware\IMS\Server\Domain\Cache;

class ObjectCacheInformation
{
    // the cache time in seconds
    private int $cacheTime;
    // should new content be cached after cache timeout
    private bool $shouldGetNewContentAfterCacheTime;

    public function __construct(int $cacheTime, bool $shouldGetNewContentAfterCacheTime)
    {
        $this->cacheTime = $cacheTime;
        $this->shouldGetNewContentAfterCacheTime = $shouldGetNewContentAfterCacheTime;
    }

    public function getCacheTime(): int
    {
        return $this->cacheTime;
    }

    public function shouldGetNewContentAfterCacheTime(): bool
    {
        return $this->shouldGetNewContentAfterCacheTime;
    }
}