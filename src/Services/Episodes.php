<?php
namespace PodcastIndexWrapper\Services;

class Episodes extends Service
{
    protected $endpoint = 'episodes';

    public function byFeedUrl(string $feedUrl, array $params = [])
    {
        return $this->get('byfeedurl', array_merge($params, [
            'url' => $feedUrl
        ]));
    }

    public function byFeedId($id, array $params = [])
    {
        return $this->get('byfeedid', array_merge($params, [
            'id' => $id
        ]));
    }

    public function byITunesId($id, array $params = [])
    {
        return $this->get('byitunesid', array_merge($params, [
            'id' => $id
        ]));
    }

    public function byPodcastGuid($guid, array $params = [])
    {
        return $this->get('bypodcastguid', array_merge($params, [
            'guid' => $guid
        ]));
    }

    public function byGuid($guid, array $params = [])
    {
        return $this->get('byguid', array_merge($params, [
            'guid' => $guid
        ]));
    }

    public function byId($id, array $params = [])
    {
        return $this->get('byid', array_merge($params, [
            'id' => $id
        ]));
    }

    public function random(array $params = []) 
    {
        return $this->get('random', $params);
    }

    public function live(array $params = [])
    {
        return $this->get('live', $params);
    }
}