<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\User;
use App\Models\UserConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;
use MailerSend\Helpers\Builder\Variable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AuthController extends Controller
{
    private function getMeta($parameter = null)
    {
        $meta = new \StdClass();
        $meta->locale = LaravelLocalization::getCurrentLocale();
        $meta->language = LaravelLocalization::getCurrentLocaleName();
        $meta->languages = LaravelLocalization::getSupportedLocales();
        $metas = Meta::where('url', Route::currentRouteName())->whereIn('language', ['en', LaravelLocalization::getCurrentLocale()])->get();
        foreach ($metas as $metaSingle) {
            $meta->metas[$metaSingle->language] = $metaSingle;
        }
        return $meta;
    }

    private function generateUniqueUsername($email)
    {
        $baseName = Str::before($email, '@');
        if (strlen($baseName) > 23) {
            $baseName = substr($baseName, 0, 23);
        }
        $name = $baseName;
        $counter = 1;

        while (User::where('name', $name)->exists()) {
            $name = $baseName . $counter;
            ++$counter;
        }

        return $name;
    }

    public function signup()
    {
        if (!empty(Auth::user()->id)) {
            return redirect()->route('app::index');
        }
        $meta = $this->getMeta();
        return view('auth.signup', [
            'meta' => $meta
        ]);
    }

    public function signin()
    {
        if (!empty(Auth::user()->id)) {
            return redirect()->route('app::index');
        }
        $meta = $this->getMeta();
        return view('auth.signin', [
            'meta' => $meta
        ]);
    }

    public function doSignup(Request $request)
    {
        \Log::info('Session ID: ' . session()->getId());
        \Log::info('CSRF Token from session: ' . session()->token());
        \Log::info('CSRF Token from request: ' . $request->header('X-CSRF-TOKEN'));
        \Log::info('Request method: ' . $request->method());
        $request->validate([
            'email' => 'required|email|unique:users|max:191',
            'pass' => 'required|min:6|max:191',
            'terms' => 'accepted',
        ], [
            'email.required' => __('auth.validation_email_required'),
            'email.email' => __('auth.validation_email_email'),
            'email.unique' => __('auth.validation_email_unique'),
            'email.max' => __('auth.validation_email_max'),
            'pass.required' => __('auth.validation_pass_required'),
            'pass.min' => __('auth.validation_pass_min'),
            'pass.max' => __('auth.validation_pass_max'),
            'terms.accepted' => __('auth.validation_terms_accepted'),
        ]);

        $user = new User();
        $user->email = trim($request->email);
        $user->name = $this->generateUniqueUsername($request->email);
        $user->password = Hash::make($request->pass);
        $user->save();

        $confirmation = new UserConfirmation();
        $confirmation->user_id = $user->id;
        $confirmation->token = Str::random(rand(16, 32));
        $confirmation->save();

        $mailersend = new MailerSend(['api_key' => env('MAILERSEND_API_KEY')]);

        $recipients = [
            new Recipient($user->email, $user->name),
        ];

        $variables = [
            [
                'email' => $user->email,
                'data' => [
                    'username' => $user->email,
                    'email' => $user->email,
                    'action_url' => str_replace('http://', 'https://', route('confirm', ['code' => $user->id . 'x' . $confirmation->token])),
                    'login_url' => str_replace('http://', 'https://', route('login')),
                    'supportemail' => 'support@sfccy.com',
                    'app_name' => env('APP_NAME'),
                    'title1' => __('auth.signup_email_t1'),
                    'abs1' => __('auth.signup_email_a1'),
                    'title2' => __('auth.signup_email_t2'),
                    'abs2' => __('auth.signup_email_a2'),
                    'a2l1' => __('auth.signup_email_a2_l1'),
                    'a2l2' => __('auth.signup_email_a2_l2'),
                    'a2l3' => __('auth.signup_email_a2_l3'),
                    'a2l4' => __('auth.signup_email_a2_l4'),
                    'a2l5' => __('auth.signup_email_a2_l5'),
                    'abs3' => __('auth.signup_email_a3'),
                    'a3l1' => __('auth.signup_email_a3_l1'),
                    'a3l2' => __('auth.signup_email_a3_l2'),
                    'a3l3' => __('auth.signup_email_a3_l3'),
                    'a3l4' => __('auth.signup_email_a3_l4'),
                    'a3l5' => __('auth.signup_email_a3_l5'),
                    'title3' => __('auth.signup_email_t3'),
                    'abs4' => __('auth.signup_email_a4'),
                    'but1' => __('auth.signup_email_b1'),
                    'abs5' => __('auth.signup_email_a5'),
                    'title4' => __('auth.signup_email_t4'),
                    'text1' => __('auth.signup_email_tx1'),
                    'text2' => __('auth.signup_email_tx2'),
                    'abs6' => __('auth.signup_email_a6'),
                    'a6l1' => __('auth.signup_email_a6_l1'),
                    'a6l2' => __('auth.signup_email_a6_l2'),
                    'a6l3' => __('auth.signup_email_a6_l3'),
                    'a6l4' => __('auth.signup_email_a6_l4'),
                    'a6l5' => __('auth.signup_email_a6_l5'),
                    'title5' => __('auth.signup_email_t5'),
                    'abs7' => __('auth.signup_email_a7'),
                    'title6' => __('auth.signup_email_t6'),
                    'a8l1' => __('auth.signup_email_a8_l1'),
                    'a8l2' => __('auth.signup_email_a8_l2'),
                    'a8l3' => __('auth.signup_email_a8_l3'),
                    'a8l4' => __('auth.signup_email_a8_l4'),
                    'abs9' => __('auth.signup_email_a9'),
                    'abs10' => __('auth.signup_email_a10'),
                    'abs11' => __('auth.signup_email_a11'),
                    'text3' => __('auth.signup_email_tx3'),
                ]
            ]
        ];

        $tags = ['auth', 'welcome'];

        $emailParams = (new EmailParams())
            ->setFrom('info@sfccy.com')
            ->setFromName('Startup Founders Community')
            ->setRecipients($recipients)
            ->setSubject(__('auth.signup_email_t1'))
            ->setTemplateId('3z0vklojmovg7qrx')
            ->setPersonalization($variables)
            ->setTags($tags);

        $mailersend->email->send($emailParams);

        Auth::loginUsingId($user->id, true);

        return redirect()->route('app::index');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => __('auth.validation_email_required'),
            'pass.required' => __('auth.validation_pass_required'),
            'pass.min' => __('auth.validation_pass_min')
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('app::index');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials')->withInput();
    }

    public function forgot()
    {
        if (!empty(Auth::user()->id)) {
            return redirect()->route('app::index');
        }
        $meta = $this->getMeta();
        return view('auth.forgot', [
            'meta' => $meta
        ]);
    }

    public function doForgot(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => __('auth.validation_email_required'),
            'email.email' => __('auth.validation_email_email')
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if (!empty($user->id)) {
            $token = DB::table('password_reset_tokens')->where('email', $credentials['email'])->first();
            if (empty($token->token)) {
                $restoreToken = Str::random(rand(24, 36));
                $token = DB::table('password_reset_tokens')->insert([
                    'email' => $credentials['email'],
                    'token' => $restoreToken,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                $mailersend = new MailerSend(['api_key' => env('MAILERSEND_API_KEY')]);

                $variables = [
                    [
                        'email' => $user->email,
                        'data' => [
                            'username' => $user->email,
                            'email' => $user->email,
                            'custorer_email' => $user->email,
                            'action_url' => str_replace('http://', 'https://', route('reset', ['code' => $restoreToken])),
                            'login_url' => str_replace('http://', 'https://', route('login')),
                            'support_email' => 'support@sfccy.com',
                            'app_name' => env('APP_NAME'),
                            'title1' => __('auth.restore_email_t1'),
                            'abs1' => __('auth.restore_email_a1'),
                            'but1' => __('Reset Password'),
                            'abs2' => __('auth.restore_email_a2'),
                            'abs3' => __('auth.restore_email_a3'),
                            'abs4' => __('auth.restore_email_a4'),
                            'a4l1' => __('auth.restore_email_a4_l1'),
                            'a4l2' => __('auth.restore_email_a4_l2'),
                            'a4l3' => __('auth.restore_email_a4_l3'),
                            'a4l4' => __('auth.restore_email_a4_l4'),
                            'title2' => __('auth.restore_email_t2'),
                            'abs5' => __('auth.restore_email_a5'),
                            'abs6' => __('auth.restore_email_a6'),
                            'abs7' => __('auth.restore_email_a7'),
                            'abs8' => __('auth.restore_email_a8'),
                            'a8l1' => __('auth.restore_email_a8_l1'),
                            'a8l2' => __('auth.restore_email_a8_l2'),
                            'a8l3' => __('auth.restore_email_a8_l3'),
                            'a8l4' => __('auth.restore_email_a8_l4'),
                            'text1' => __('auth.signup_email_tx3'),
                        ]
                    ]
                ];

                $tags = ['auth', 'password'];

                $recipients = array(new Recipient($user->email, $user->name));
                $emailParams = (new EmailParams())
                    ->setFrom('info@sfccy.com')
                    ->setFromName('Startup Founders Community')
                    ->setRecipients($recipients)
                    ->setSubject('Password Reset Request (Account Security)')
                    ->setTemplateId('0r83ql3j9o0gzw1j')
                    ->setPersonalization($variables)
                    ->setTags($tags);

                $mailersend->email->send($emailParams);
                return redirect()->route('forgot')->with('success', 'Recovery instructions were send successfully')->withInput();
            }
        }

        return redirect()->route('forgot')->with('error', 'Invalid credentials')->withInput();
    }

    public function confirm($code)
    {
        if (!empty($code)) {
            $parts = explode('x', $code);
            $user = User::find($parts[0]);
            if (!empty($user->id)) {
                if (empty($user->email_verified_at)) {
                    $code = substr($code, strpos($code, 'x') + 1);
                    $confirmation = UserConfirmation::where('user_id', $user->id)->where('token', $code)->first();
                    if (!empty($confirmation->id)) {
                        $user->email_verified_at = date('Y-m-d H:i:s');
                        $user->save();
                        Auth::loginUsingId($user->id, true);
                        return redirect()->route('app::index');
                    }
                }
            }
        }
        $meta = $this->getMeta();
        return view('auth.confirm', [
            'meta' => $meta
        ]);
    }

    public function reset($code)
    {
        if (!empty(Auth::user()->id)) {
            return redirect()->route('app::index');
        }
        if (!empty($code)) {
            $meta = $this->getMeta();
            $token = DB::table('password_reset_tokens')->where('token', $code)->first();
            if (!empty($token->token)) {
                $user = User::where('email', $token->email)->first();
                if (!empty($user->id) && !empty($user->active)) {
                    return view('auth.reset', [
                        'reset' => $token,
                        'meta' => $meta
                    ]);
                }
            } elseif ($code == 'success') {
                return view('auth.reset', [
                    'success' => true,
                    'meta' => $meta
                ]);
            }
        }
        return redirect()->route('login');
    }

    public function doReset($code, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|max:191'
        ], [
            'password.required' => __('auth.validation_pass_required'),
            'password.min' => __('auth.validation_pass_min'),
            'password.max' => __('auth.validation_pass_max')
        ]);

        if (!empty($code)) {
            $token = DB::table('password_reset_tokens')->where('token', $code)->first();
            if (!empty($token->token)) {
                $user = User::where('email', $token->email)->first();
                if (!empty($user->id) && !empty($user->active)) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::table('password_reset_tokens')->where('token', $code)->delete();
                    return redirect()->route('reset', ['code' => 'success'])->with('success', 'Password was reset successfully');
                }
            }
        }
        return redirect()->route('reset', ['code', $code])->with('error', 'Invalid credentials')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('web::index');
    }
}
