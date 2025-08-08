<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
//        $siteData =[];
//        $out  = $this->APIcall('GET','http://10.10.10.35:8805/blogdata/tokslaw',[]);
//        $siteData['blogdata'] = $out['payload']['blogdata'];
//        $siteData['blog_media_url'] = $out['payload']['image_url'];
 //       var_dump( $siteData['blog_media_url']);
//       exit();

//        $siteData =[];
//        //http://10.204.5.100:9083/en/wrench/api/v1/blogdata
//        $out  = $this->APIcall('GET','http://10.10.10.35:8805/en/wrench/api/v1/blogdata',[]);
//         $out  = $this->APIcall('GET','http://10.10.10.35:7083/blogdata/tokslaw',[]);
//        var_dump($out['blogdata']);
//        exit();
//        $siteData['blogdata'] = $out['blogdata'] ?? [];
//        var_dump($siteData);
//          exit;
//
//        $siteData['blogdata'] = $out['payload']['blogdata'];
//        $siteData['blog_media_url'] = $out['payload']['image_url'];

        //return view('welcome_message',$siteData);
        return view('welcome_message');
    }
}
