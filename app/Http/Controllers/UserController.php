<?php

namespace App\Http\Controllers;

use App\Events\UserPaymentEvent;
use App\UserVips;
use App\Vips;
use Exception;
use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{

    public function index()
    {
        return $this->responseData(self::SUCCESS_CODE, self::SUCCESS_MSG, Users::all());//
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $user = Users::find($id);
        if (!$user)
            return $this->responseData(self::FAIL_CODE, self::NOT_FOUNT_MSG);
        return $this->responseData(self::SUCCESS_CODE, self::SUCCESS_MSG, $user);
    }

    public function create(Request $request)
    {
        try {
            $users = new Users;
            $users->user_name = $request->post('user_name');
            $users->email = $request->post('email');
            $users->full_name = $request->post('full_name');
            $users->save();

            $data = array('code' => self::SUCCESS_CODE, 'msg' => self::SUCCESS_MSG);
        } catch (Exception $e) {
            $data = array('code' => self::FAIL_CODE, 'msg' => self::FAIL_MSG);
        }
        return $this->responseData($data['code'], $data['msg']);
    }


    public function update($id, Request $request)
    {
        $users = Users::find($id);
        if (!$users)
            return $this->responseData(self::FAIL_CODE, self::NOT_FOUNT_MSG);

        try {
            $users->user_name = $request->input('user_name');
            $users->email = $request->input('email');
            $users->full_name = $request->input('full_name');
            $users->save();

            $data = array('code' => self::SUCCESS_CODE, 'msg' => self::SUCCESS_MSG);
        } catch (Exception $e) {
            $data = array('code' => self::FAIL_CODE, 'msg' => self::FAIL_MSG);
        }

        return $this->responseData($data['code'], $data['msg']);
    }

    public function destroy($id)
    {
        Users::destroy($id);
        return $this->responseData(self::SUCCESS_CODE, self::SUCCESS_MSG);
    }

    public function payment(Request $request)
    {
        /**
         * @var Users $user
         * */
        $data = $request->post();
        $user = Users::find($data['user_id']);

        if ($data['gold'] <= 0 || !$user) {
            return $this->responseData(self::FAIL_CODE, self::PARAM_INVALID_MSG);
        }

        $gifts['gold'] = (int)$data['gold'];

        $user->updateGifts($gifts);

        event(new UserPaymentEvent($user, $data['gold']));

        return $this->responseData(self::SUCCESS_CODE, self::SUCCESS_MSG, $user);
    }
}
