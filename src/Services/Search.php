<?php
namespace PodcastIndexWrapper\Services;

class Search extends Service
{
    protected $endpoint = 'search';

    public function byTerm(string $term, int $page = 1, int $perPage = 10)
    {
        // $res   = $this->get('byterm', ['q' => $term]);
        // $items = $res['feeds'] ?? [];

        // return $this->paginate($items, $page, $perPage);
        return $this->get('byterm', [
            'q' => $term
        ]);
    }
}