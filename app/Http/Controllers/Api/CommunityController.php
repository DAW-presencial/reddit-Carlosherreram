<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CommunityResource::collection(Community::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommunityRequest $request
     * @return CommunityResource
     */
    public function store(StoreCommunityRequest $request)
    {
        $comunidad = Community::create([
            'name'=> $request->name,
        ]);
        return new CommunityResource($comunidad);

    }

    /**
     * Display the specified resource.
     *
     * @param Community $community
     * @return CommunityResource
     */
    public function show(Community $community)
    {
        return new CommunityResource($community);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCommunityRequest $request
     * @param Community $community
     * @return CommunityResource
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        $community->update([
            'name'=> $request->name,
        ]);
        return new CommunityResource($community);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Community $community
     * @return bool|null
     */
    public function destroy(Community $community)
    {
        return $community->delete();
    }
}
