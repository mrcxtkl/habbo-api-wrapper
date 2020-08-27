<?php
    # testID: hhbr-d58ba6a597228a48576a8eb92d7a5726

    /*
    # API Information
    * @method       - GET
    * @baseurl      - https://www.habbo.<domain> /api/public/
    * @userEndpoint - /api/public/users?name=<username>

    # User Endpoints
    * @userGroups   - /api/public/users/<uniqueID>/groups
    * @userBadges   - /api/public/users/<uniqueID>/badges
    * @userFriends  - /api/public/users/<uniqueID>/friends
    */

    class RequestAPI
    {
        private $API_URL = 'https://www.habbo.com.br/api/public';
        private $USER_AGENT = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';

        function GET(string $ENDPOINT)
        {
            $ch = curl_init($this->API_URL . $ENDPOINT);

            curl_setopt($ch, CURLOPT_USERAGENT, $this->USER_AGENT);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result);
        }
    }
