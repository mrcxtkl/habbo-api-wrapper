<?php
    require_once 'class.api.php';
    require_once 'class.user.php';

    class HabboClient {
        private $api;
        private $uniqueId;

        function __construct(string $username) {
            $this->api = new RequestAPI();
            $this->uniqueId = $this->api->GET("/users?name=$username")->uniqueId;

            $this->user = new User($this->api, $this->uniqueId);
        }
    }