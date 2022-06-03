<?php

namespace App\Http\Controllers;

use App\Classes\FileComponent;
use App\Http\Requests\user\StoreUserInfoRequest;
use App\Http\Requests\user\UpdateUserInfoRequest;
use App\Http\Resources\UserInfoResource;
use App\Models\UserInfo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\user\StoreUserInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserInfoRequest $request)
    {
        App::abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        App::abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\user\UpdateUserInfoRequest  $request
     * @param  \App\Models\UserInfo  $userInfo
     * @return UserInfoResource
     */
    public function update(UpdateUserInfoRequest $request, UserInfo $userInfo)
    {
        $data = $request->validated();
        $valuesToUpdate = array_intersect_key($data, array_fill_keys($userInfo->fillable, 0));

        if(isset($data['img'])) {
            $relativePath = FileComponent::saveImage($data['img']);
            $valuesToUpdate['img'] = $relativePath;

            // If there is an old image, delete it
            if ($userInfo->img) {
                $absolutePath = public_path($userInfo->img);
                File::delete($absolutePath);
            }
        }
        $userInfo->query()->update($valuesToUpdate);
        return new UserInfoResource($userInfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        App::abort(404);
    }
}
