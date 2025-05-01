<?php
namespace PodcastIndexWrapper\Services;

use PodcastIndexWrapper\Client;

abstract class Service
{
    protected $client;

    protected $endpoint = '';

    protected $parameters = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $endpoint, array $query = [])
    {
        return $this->client->get(
            $this->getFullEndpoint($endpoint),
            $this->getFullQuery($query)
        );
    }

    public function post(string $endpoint, array $data = [])
    {
        return $this->client->post(
            $this->getFullEndpoint($endpoint),
            $data
        );
    }

    public function withParameters(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    protected function getFullEndpoint(string $endpoint)
    {
        return $this->endpoint . '/' . ltrim($endpoint,'/');
    }

    protected function getFullQuery(array $query = [])
    {
        return array_merge($this->parameters, $query);
    }

    /**
     * Slice an array into pages.
     *
     * @param  array  $items
     * @param  int    $page
     * @param  int    $perPage
     * @return array  [ 'data' => array, 'meta' => array ]
     */
    protected function paginate(array $items, int $page = 1, int $perPage = 10): array
    {
        $total    = count($items);
        $lastPage = (int) ceil($total / $perPage);
        $page     = max(1, min($page, $lastPage));
        $offset   = ($page - 1) * $perPage;
        $slice    = array_slice($items, $offset, $perPage);

        return [
            'data' => $slice,
            'meta' => [
                'total'        => $total,
                'per_page'     => $perPage,
                'current_page' => $page,
                'last_page'    => $lastPage,
            ],
        ];
    }
}