<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function APIcall($method, $url, $data) {
        //  $curl = curl_init();
        $curl = curl_init($url);
        switch ($method) {
            case "GET":
                $params2 = '';
                foreach($data as $key2=>$value2)
                    $params2 .= $key2.'='.$value2.'&';

                $params2 = trim($params2, '&');
                $url = $url.'?'.$params2;// add param to URL
                log_message('critical', "API URL FINAL =>".$url );
                //curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
                //curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                //curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    //  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                //  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: RegisteredAPIkey',
            'Content-Type: application/json',
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);

        if(!$result) {
            echo("Connection failure!");
        }
        curl_close($curl);
        return json_decode($result, true);
    }
}
