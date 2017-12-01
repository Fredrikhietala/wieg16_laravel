<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    // Method to send Get request to url
    private function doCurl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }

    public function index(Request $request) {
        $code = $request->input('code');
        $data = $this->myAccountKit($code);
        return response()->json($data);
    }

    public function myAccountKit($code) {

    // Initialize variables
    $app_id = '308933162954854';
    $secret = 'f36e6499e112d766645f07003e850193';
    $version = 'v1.2'; // 'v1.1' for example

    // Exchange authorization code for access token
    $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
        'grant_type=authorization_code'.
        '&code='. $code .
        "&access_token=AA|$app_id|$secret";
    $data = $this->doCurl($token_exchange_url);

    if(!isset($data['id'])) dd($data);
    $user_id = $data['id'];
    $user_access_token = $data['access_token'];
    $refresh_interval = $data['token_refresh_interval_sec'];

    // Get Account Kit information
    $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
        'access_token='.$user_access_token;
    $data = $this->doCurl($me_endpoint_url);
    $phone = isset($data['phone']) ? $data['phone']['number'] : '';
    $email = isset($data['email']) ? $data['email']['address'] : '';
    return $data;

    }

    public function loginForm() {
        return view ('login');
    }

    public function facebook() {
        $fb = new Facebook([
            'app_id' => '308933162954854',
            'app_secret' => '59b1410160b94d37ecf86c944fa88d4f',
            'default_graph_version' => 'v2.10',
        ]);

        $helper = $fb->getJavaScriptHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            echo 'No cookie set or no OAuth data could be obtained from cookie.';
            exit;
        }
        $response = $fb->get('/me', $accessToken);
        $me = $response->getGraphUser();
        return response()->json($me->asJson());

    }

}
