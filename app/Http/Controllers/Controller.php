<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function responseData($code, $data = null, $msg = null, $status = 200)
    {
        $content = array('code' => $code);
        if ($msg)
            $content['msg'] = $msg;

        if ($data)
            $content['data'] = $data;

        return response($content, $status)
            ->header('Content-Type', 'application/json');

    }
}
