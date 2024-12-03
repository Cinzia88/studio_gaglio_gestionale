<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CreateAccountUser extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'confirm_password' => ['required', 'same:password'],
            'device_token' => ['nullable', 'string'],
        ]);

        //Handle File Upload
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'device_token' => $request->token ?? '',
        ]);

        event(new Registered($user));

        Auth::login($user);

        $token = $user->createToken('api-token');


        return response()->json([
            'user' => $user,
            'message' => 'Utente registrato. Controlla la tua email per verificare',
            'token' => $token->plainTextToken,
        ]);
    }

    public function sendMail($email)
    {
        if (auth()->user()) {
            $user = User::where('email', $email)->get();

            if (count($user) > 0) {
                $domain = URL::to('/');
                $random = Str::random(64);
                $url = $domain . 'verify-email' . $random;

                $data['url'] = $url;
                $data['name'] = auth()->user()->name;
                $data['email'] = $email;
                $data['title'] = 'Verifica Email';
                $data['body'] = 'Clicca per verificare la mail';

                Mail::send('api/verify_email', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });
                $user = User::find($user[0]['id']);
                $user->remember_token = $random;
                $user->save();

                return response()->json([
                    'stato' => true,
                    'message' => 'email inviata',
                ]);
            } else {
                return response()->json([
                    'state' => false,
                    'message' => 'Utente non trovato',
                ], 400);
            }
        } else {
            return response()->json([
                'state' => false,
                'message' => 'Utente non autenticato',
            ]);
        }
    }
}
