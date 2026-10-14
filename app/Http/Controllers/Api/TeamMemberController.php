<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = TeamMember::with('user')->get();
        return ApiResponse::response(TeamMemberResource::collection($teamMembers), 'Team members retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = User::where('email', $data['email'])->first()->id;

        $teamMember = TeamMember::create($data);
        return ApiResponse::response(new TeamMemberResource($teamMember), 'Team member created successfully.', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        $teamMember->load('user');
        return ApiResponse::response(new TeamMemberResource($teamMember), 'Team member retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $data = $request->validated();
        // $data['user_id'] = $teamMember->id;
        // $data['user_id'] = User::where('email', $data['email'])->first()->id;

        $teamMember->update($data);
        return ApiResponse::response(new TeamMemberResource($teamMember), 'Team member updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return ApiResponse::response(null, 'Team member deleted successfully.', 200);
    }
}
