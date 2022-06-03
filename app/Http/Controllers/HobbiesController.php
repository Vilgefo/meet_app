<?php

namespace App\Http\Controllers;

use App\Http\Requests\hobbies\StoreHobbiesRequest;
use App\Http\Requests\hobbies\UpdateHobbiesRequest;
use App\Models\Hobbies;
use Illuminate\Http\Request;

class HobbiesController extends Controller
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
            'defaults' => Hobbies::query()->where(['default'=>true]),
            'selected_hobbies' => $user->userInfo->hobbies
        ];
        return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\hobbies\StoreHobbiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHobbiesRequest $request)
    {
        $hobby = Hobbies::query()->where(['id'=>1])->first();
        return response($hobby->synonyms);
        $data = $request->validated();
        $hobby = Hobbies::query()->create([
            'name' => $data['name'],
            'default' => $data['default'] ?? false
        ]);

        return response($hobby, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function show(Hobbies $hobbies)
    {
        \App::abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\hobbies\UpdateHobbiesRequest  $request
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHobbiesRequest $request, Hobbies $hobbies)
    {
        \App::abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobbies  $hobbies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobbies $hobbies)
    {
        $hobbies->delete();

        return response('', 204);
    }
}
