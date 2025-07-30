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
        // Validate cơ bản áp dụng chung cho mọi loại user
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:employer,candidate'],
        ]);

        $role = $request->role;

        // Validate riêng cho employer
        if ($role === 'employer') {
            $request->validate([
                'company_name' => ['required', 'string', 'max:255'],
                'website' => ['nullable', 'url', 'max:255'],
                'description' => ['nullable', 'string'],
                'address' => ['required', 'string', 'max:255'],
                'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Tối đa 2MB
            ]);
        }

        // Tạo user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        // Tạo dữ liệu phụ tùy theo role
        if ($role === 'employer') {
            $employer = new Employer();
            $employer->user_id = $user->id;
            $employer->company_name = $request->company_name;
            $employer->website = $request->website;
            $employer->description = $request->description;
            $employer->address = $request->address;

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/logos', $filename);
                $employer->company_logo = 'storage/logos/' . $filename;
            }

            $employer->save();
        } else {
            $candidate = new Candidate();
            $candidate->user_id = $user->id;
            $candidate->address = 'Chưa cập nhật';
            $candidate->resume = null;
            $candidate->save();
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('client.index'));
    }
}
