<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the form to add a new member
     *
     * @return \Illuminate\Http\Response
     */
    public function addMember()
    {
        $schools = \App\School::all();

        return view('add-member', ['schools' => $schools]);
    }

    /**
     * Display the form to delete a member
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMember($id)
    {
        $member = \App\Member::find($id);
        $member->delete();

        return redirect()->route('members')->with('status', 'Member deleted!');
    }

    /**
     * Store a new member
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeMember(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:members,email|max:255',
            'school_id' => 'required|numeric'
        ]);

        $member = new \App\Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->school_id = $request->school_id;
        $member->save();

        return redirect()->route('members')->with('status', 'Member added!');
    }

    /**
     * View all members
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllMembers(Request $request)
    {
        if (isset($request->school_id) && $request->school_id != 'view-all') {
            $members = \App\Member::where('school_id', $request->school_id)->paginate(10);
            $appends = ['school' => $request->school_id];
        } else {
            $members = \App\Member::paginate(10);
        }

        return view('members', [
            'members' => $members,
            'schools' => \App\School::all(),
            'appends' => isset($appends) ? $appends : []
        ]);
    }

    /**
     * Store a new school
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchool(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:schools,name|max:50',
        ]);

        $school = new \App\School;
        $school->name = $request->name;
        $school->save();

        return redirect()->route('schools')->with('status', 'School added!');
    }

    /**
     * View all schools
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllSchools()
    {
        $schools = \App\School::paginate(10);

        return view('schools', ['schools' => $schools]);
    }
}
