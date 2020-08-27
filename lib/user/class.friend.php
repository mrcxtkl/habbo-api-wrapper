<?php
class Friend
{
    private $api;

    function __construct(object $api, string $id)
    {
        $this->api = $api;
        $this->data = $this->api->GET("/users/$id/friends");
        $this->load();
    }

    private function load() {
        foreach ($this->data as $obj) $obj->avatarURL = $this->avatarURL($obj->figureString);
    }

    public function avatarURL(string $figureString, string $params = '') {
        return 'https://www.habbo.com/habbo-imaging/avatarimage?figure='. $figureString . "&$params";
    }
}
