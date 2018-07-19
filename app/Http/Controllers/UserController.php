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
        return $this->responseData(1, Users::all());
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $user = Users::find($id);
        if (!$user)
            return $this->responseData(-1, null, 'User not found');
        return $this->responseData(1, $user);
    }

    public function create(Request $request)
    {
        try {
            $users = new Users;
            $users->user_name = $request->post('user_name');
            $users->email = $request->post('email');
            $users->full_name = $request->post('full_name');
            $users->save();

            $data = array('code' => 1, 'msg' => 'Success');
        } catch (Exception $e) {
            $data = array('code' => -1, 'msg' => 'Failed');
        }
        return $this->responseData($data['code'], null, $data['msg']);
    }


    public function update($id, Request $request)
    {
        $users = Users::find($id);
        if (!$users)
            return $this->responseData(-1, null, 'User not fount');

        try {
            $users->user_name = $request->input('user_name');
            $users->email = $request->input('email');
            $users->full_name = $request->input('full_name');
            $users->save();

            $data = array('code' => 1, 'msg' => 'Update success');
        } catch (Exception $e) {
            $data = array('code' => -2, 'msg' => 'Update failed');
        }

        return $this->responseData($data['code'], null, $data['msg']);
    }

    public function destroy($id)
    {
        Users::destroy($id);
        return $this->responseData(1, null, 'Destroy success');
    }

    public function payment(Request $request)
    {
        /**
         * @var Users $user
         * */
        $data = $request->post();
        $user = Users::find($data['user_id']);

        if ($data['gold'] <= 0 || !$user) {
            return $this->responseData(-1, null, 'Param invalid');
        }

        $gifts['gold'] = (int)$data['gold'];

        $user->updateGifts($gifts);

        event(new UserPaymentEvent($user, $data['gold']));

        return $this->responseData(1, $user, 'Payment success');
    }
}
