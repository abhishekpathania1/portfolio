<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Proposalimages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
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

    public function index()
    {
        return Proposal::where(['user_id' => auth()->user()->id])->get();
    }
    public function show($id)
    {
        return Proposal::where(['user_id' => auth()->user()->id, 'id' => $id])->get();
    }
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'portfolio_id' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['status' => 'error', 'message' => $validate->errors()->all()], 401);
        }

        $data = $request->merge(['user_id' => auth()->user()->id])->except(['image']);
        $proposal = Proposal::create($data);

        if ($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $resp = $proposal->proposalImages()->create(['images' => $image]);
            }
        }

        return response(['status' => 'success'], 200);
    }
}