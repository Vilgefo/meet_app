<?php

namespace App\Http\Controllers;

use App\Http\Requests\interests\StoreInterestsRequest;
use App\Http\Requests\interests\UpdateInterestsRequest;
use App\Models\Hobbies;
use App\Models\Interests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $data = [
            'default_interests' => Interests::query()->where(['default'=>true]),
            'selected_interests' => $user->userInfo->interests
        ];
        return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\interests\StoreInterestsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterestsRequest $request)
    {
        $data = $request->validated();
        $interest = Interests::query()->create([
            'name' => $data['name'],
            'default' => $data['default'] ?? false
        ]);

        return response($interest, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function show(Interests $interests)
    {
        App::abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\interests\UpdateInterestsRequest  $request
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterestsRequest $request, Interests $interests)
    {
        App::abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interests $interest)
    {
        $interest->delete();
        return response('', 204);
    }
}
