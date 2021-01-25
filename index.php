<?php
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
    include "data.php";
    session_start();

    function oAuthavtorisation()
    {
        $oauth = new VK\OAuth\VKOAuth();
        $display = VK\OAuth\VKOAuthDisplay::PAGE;
        $scope = [VK\OAuth\Scopes\VKOAuthUserScope::WALL, VK\OAuth\Scopes\VKOAuthUserScope::FRIENDS];
        $response_type = VK\OAuth\VKOAuthResponseType::TOKEN;
        return $browser_url = $oauth->getAuthorizeUrl($response_type, CLIENT_ID, REDIRECT_URL, $display, $scope);
    }    
?>
<form action="<?= htmlspecialchars(oAuthavtorisation()) ?>" method="POST">
    <button type="submit">открыть</button>
</form>
<?php
    if(isset($_GET['access_token'])) $_COOKIE['token'] = $_GET['access_token'];
    
    if (isset($_COOKIE['token'])) {

        $vk = new VK\Client\VKApiClient();        
        $response = $vk->users()->get($_COOKIE['token'], [        
            'user_ids' => array(1, 210700286),
            'fields' => array('city', 'photo'),
            ]);
        print_r($response);
    }
    //Бот должен определить данные пользователя ВК: ФИО, дата рождения, номер телефона и почту. 
    //Далее эти данные отправить на сторонний сервер Х по HTTP запросу. 
    //Сервер Х вернет ответ, что такой пользователь уже есть или ответ, что пользователь зарегистрирован.

        
?>