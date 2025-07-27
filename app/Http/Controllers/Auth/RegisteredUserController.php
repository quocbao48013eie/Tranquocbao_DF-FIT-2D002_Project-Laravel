<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $role = $request->role ?? 'candidate';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        if ($role == 'employer') {
            $employer = new Employer();
            $employer->user_id = $user->id;
            $employer->company_name = $request->company_name;
            $employer->website = $request->website;
            $employer->description = $request->description;
            $employer->address = $request->address;
            $employer->save();
        } else {
            $candidate = new Candidate();
            $candidate->user_id = $user->id;
            $candidate->address = 's';
            $candidate->resume = 's';
            $candidate->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('client.index', absolute: false));
    }
}
