<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    protected function cacheTag(): string
    {
        return $this->cacheTag ?? class_basename($this);
    }


    protected function rememberCache(string $key, \Closure $callback)
    {
        $duration = 86400; // 24 hours in seconds

        $cacheKey = $this->buildCacheKey($key);

        return Cache::remember($cacheKey, $duration, $callback);
    }

    public function forgetCache(string $key): void
    {
        if ($key) {
            Cache::forget($this->buildCacheKey($key));
            return;
        }

        Cache::flush();
    }

    protected function buildCacheKey(string $key): string
    {
        return sprintf('%s_%s', $this->cacheTag(), $key);
    }
}
