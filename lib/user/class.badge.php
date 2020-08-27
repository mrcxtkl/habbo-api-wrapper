<?php
class Badge
{
    private $api;

    function __construct(object $api, string $id)
    {
        $this->api = $api;
        $this->data = $this->api->GET("/users/$id/badges");
        $this->load();
    }

    private function load() {
        foreach ($this->data as $obj) $obj->badgeURL = $this->badgeURL($obj->code);
    }

    public function badgeURL (string $badgeCode) {
        return "https://images.habbo.com/c_images/album1584/$badgeCode.gif";
    }
}
