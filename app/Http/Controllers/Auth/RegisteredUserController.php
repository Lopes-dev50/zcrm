<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plano;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\BemVindoMail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
          //  'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'equipe_id' => '9999999',
            'tempo' => date("Y-m-d H:i:s"),
            'is_active' => '1',
            'nivel' => '0',
        ])->givePermissionTo('free');

        event(new Registered($user));

        Auth::login($user);

        $plano = Plano::create([
            'user_id' => $user->id,
            'acesso' => 0,

        ]);
        event(new Registered($plano));

      //  Mail::to('lopes.corretor@icloud.com')->send(new BemVindoMail($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
