<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // $result['categories'] = DB::table('mcategories')
        //     ->where(['status' => 1])
        //     ->orderBy('id', 'asc')->limit(3)
        //     ->get();

        // $result['subcategories'] = DB::table('scategories')
        //     ->where(['status' => 1])
        //     ->get();

        $result['user'] = $request->user();

        return view('profile.edit', $result);


    }

    public function changepassword(Request $request): View
    {



        // $result['categories'] = DB::table('mcategories')
        //     ->where(['status' => 1])
        //     ->orderBy('id', 'asc')->limit(3)
        //     ->get();

        // $result['subcategories'] = DB::table('scategories')
        //     ->where(['status' => 1])
        //     ->get();

        $result['user'] = $request->user();

        return view('profile.partials.update-password-form', $result);
    }

    public function manageaddress(Request $request): View
    {
        $result['country'] = DB::table('countries')->get();
        $result['state'] = DB::table('states')->get();
        $result['user'] = $request->user();
        $result['categories'] = DB::table('mcategories')
        ->where(['status' => 1])
        ->orderBy('id', 'asc')->limit(3)
        ->get();

    $result['subcategories'] = DB::table('scategories')
        ->where(['status' => 1])
        ->get();
        return view('profile.partials.manageaddress', $result);
    }

    public function saveAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'postcode' => 'required|digits:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city' => $request->city,
            'postcode' => $request->postcode,
        ];

        DB::table('users')->updateOrInsert(
            ['id' => $request->user_id],
            $data
        );

        return redirect()->route('profile.manageaddress')->with('success', 'Address saved successfully');
    }

    public function destroyaccount(Request $request): View
    {
        return view('profile.partials.delete-user-form', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
