<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Models\TeamMember;
use App\Models\User;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = TeamMember::with('user')->get();

        return view('admin.team-members.all', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = User::where('email', $data['email'])->first()->id;

        TeamMember::create($data);

        Notify::success('Member created successfully.');
        return to_route('team-members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        $teamMember->load('user');
        return view('admin.team-members.show', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $teamMember)
    {
        $teamMember->load('user');
        return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $data = $request->validated();

        $data['user_id'] = User::where('email', $data['email'])->first()->id;

        $teamMember->update($data);

        Notify::success('Member updated successfully.');
        return to_route('team-members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        Notify::success('Member deleted successfully.');
        return to_route('team-members.index');
    }
}
