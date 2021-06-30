<?php

namespace Chipslays\VkMusic\Traits;

use Chipslays\Collection\Collection;

trait Methods
{
    /**
     * @param string $q
     * @param integer $offset
     * @param integer $count
     * @param array $extra
     * @return Collection
     */
    public function search(string $q, int $offset = 0, int $count = 10, array $extra = []): Collection
    {
        $predefined = [
            'sort' => 2,
            'auto_complete' => 1,
            'search_own' => 0,
        ];

        $params = array_merge(compact('q', 'offset', 'count'), $predefined, $extra);

        return $this->method('audio.search', $params);
    }

    /**
     * @param string|array $audios
     * @return Collection
     */
    public function getById($audios): Collection
    {
        $params = ['audios' => implode(',', (array) $audios)];

        return $this->method('audio.getById', $params);
    }

    /**
     * @param string|int $owner_id
     * @param integer $offset
     * @param integer $count
     * @param array $extra
     * @return Collection
     */
    public function get($owner_id, int $offset = 0, int $count = 10, $extra = []): Collection
    {
        $params = array_merge(compact('owner_id', 'offset', 'count'), $extra);

        return $this->method('audio.get', $params);
    }

    /**
     * @param string|int $owner_id
     * @param integer $count
     * @return Collection
     */
    public function getPlaylists($owner_id, int $count = 10): Collection
    {
        $params = compact('owner_id', 'count');

        return $this->method('audio.getPlaylists', $params);
    }

    /**
     * @param integer $count
     * @return Collection
     */
    public function getRecommendations(int $count = 10): Collection
    {
        $params = compact('count');

        return $this->method('audio.getRecommendations', $params);
    }

    /**
     * @param integer $count
     * @return Collection
     */
    public function getPopular(int $count = 10): Collection
    {
        $params = compact('count');

        return $this->method('audio.getPopular', $params);
    }
}
