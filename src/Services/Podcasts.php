<?php
namespace PodcastIndexWrapper\Services;

class Podcasts extends Service
{
    protected $endpoint = 'podcasts';

    public function byFeedUrl(string $feedUrl)
    {
        return $this->get('byfeedurl', [
            'url' => $feedUrl
        ]);
    }

    public function byFeedId($id)
    {
        return $this->get('byfeedid', [
            'id' => $id
        ]);
    }

    public function byITunesId($id)
    {
        return $this->get('byitunesid', [
            'id' => $id
        ]);
    }

    public function byGuid($guid)
    {
        return $this->get('byguid', [
            'guid' => $guid
        ]);
    }

    public function byMedium($medium, array $params = [])
    {
        return $this->get('bymedium', array_merge($params, [
            'medium' => $medium
        ]));
    }

    public function trending(array $params = [])
    {
        return $this->get('trending', $params);

    }

    public function add(string $feedUrl)
    {
        return $this->client->add->byFeedUrl($feedUrl);
    }
}