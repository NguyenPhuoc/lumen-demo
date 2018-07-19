<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    const SUCCESS_CODE = 1;
    const SUCCESS_MSG = 'Success';

    const FAIL_CODE = -1;
    const FAIL_MSG = 'Fail';

    const NOT_FOUNT_MSG = 'Fail, not found';
    const PARAM_INVALID_MSG = 'Param invalid';

    protected function responseData($code, $msg = null, $data = null, $status = 200)
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
