<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request, Member $member): View
    {
        $search = $request->input('search');
    
        $query = $member->query();

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

        return view('member.index',[
            'member' => $member
        ]);
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(MemberRequest $request, Member $member): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $path = Storage::disk('public')->put('member/avatars', $request->file('avatar'));
            $validatedData['avatar'] = $path;
        }

        $member->create($validatedData);
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
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $path = Storage::disk('public')->put('member/avatars', $request->file('avatar'));
            $validatedData['avatar'] = $path;
            
            if ($oldAvatar = $member->avatar){
                Storage::disk('public')->delete($oldAvatar);
            }
        }

        $member->update($validatedData);
        return redirect('member')->with('success', 'Member edited successfully!');
    }

    public function delete(Member $member): RedirectResponse
    {
        if ($oldAvatar = $member->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        $member->delete();
        return redirect()->back()->with('success', 'Member was successfully deleted!');
    }
}
