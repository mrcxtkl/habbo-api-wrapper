<?php
    require_once 'user/class.group.php';
    require_once 'user/class.badge.php';
    require_once 'user/class.friend.php';

    class User
    {
        private $api;
        
        function __construct(object $api, string $id)
        {
            $this->api = $api;
            $this->data = $this->api->GET("/users/$id");
            # format
            $this->data->avatarURL = $this->avatarURL();
            $this->data->memberSince = $this->memberSince();

            # instance
            $this->groups = new Group($this->api, $id);
            $this->badges = new Badge($this->api, $id);
            $this->friends = new Friend($this->api, $id);
            
            $this->load();
        }

        private function load() {
            foreach ($this->data->selectedBadges as $obj) $obj->badgeURL = $this->badges->badgeURL($obj->code);
        }

        public function avatarURL(string $params = '') {
            return 'https://www.habbo.com/habbo-imaging/avatarimage?figure='. $this->data->figureString . "&$params";
        }

        public function memberSince (string $format = 'd/m/Y H:i') {
            return (new DateTime($this->data->memberSince))->format($format);
        }
    }