<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
    
        $query = Member::query();

        if ($search) {
            $query->where('nik', 'like', '%' . $search . '%')
                ->orWhere('full_name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('phone_number', 'like', '%' . $search . '%')
                ->orWhere('deposit_balance', 'like', '%' . $search . '%');
        }

        $memberSearch = $query->get();
        if ($memberSearch) {
            return view('member.index',[
                'member' => $memberSearch
            ]);
        }

        $member = Member::all();
        return view('member.index',[
            'member' => $member
        ]);
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(MemberRequest $request): RedirectResponse
    {
        // $validatedData = $request->validate([
        //     'nik' => 'required|unique:members',
        //     'full_name' => 'required',
        //     'address' => 'required',
        //     'phone_number' => 'required',
        //     'deposit_balance' => 'required|integer',
        // ]);

        $validatedData = $request->validated();
        Member::create($validatedData);
        return redirect('member')->with('success', 'Member added successfully!');
    }

    public function edit(Member $member): View
    {
        return view('member.edit', [
            'member' => $member
        ]);
    }

    public function update(MemberRequest $request, Member $member): RedirectResponse
    {
        // $validatedData = $request->validate([
        //     'nik' => 'required|unique:members,nik,' . $member->id,
        //     'full_name' => 'required',
        //     'address' => 'required',
        //     'phone_number' => 'required',
        //     'deposit_balance' => 'required|integer',
        // ]);

        $validatedData = $request->validated();
        $member->update($validatedData);
        return redirect('member')->with('success', 'Member edited successfully!');
    }

    public function delete(Member $member): RedirectResponse
    {
        $member->delete();
        return redirect()->back()->with('success', 'Member was successfully deleted!');
    }
}
