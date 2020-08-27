<?php
class Group
{
    private $api;

    function __construct(object $api, string $id)
    {
        $this->api = $api;
        $this->data = $this->api->GET("/users/$id/groups");
        $this->load();
    }

    private function load() {
        foreach ($this->data as $obj) $obj->badgeURL = $this->badgeURL($obj->badgeCode);
    }

    public function badgeURL (string $badgeCode) {
        return "https://www.habbo.com/habbo-imaging/badge/$badgeCode.gif";
    }
}
