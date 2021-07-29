<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPaymentController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function payment(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'proposal_id' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['status' => 'error', 'message' => $validate->errors()->all()], 401);
        }
        $data = $request->merge(['user_id' => auth()->user()->id])->except(['image']);
        $input = UserPayment::create($data);

        if ($request->hasFile('image')) {
            $resp = $input->userpaymentimage()->create(['images' => $request->image]);
        }

        return response(['status' => 'success'], 200);
    }
}