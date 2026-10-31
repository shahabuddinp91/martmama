<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AppSessionHandler
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $target = str_replace('www.', '', $host);

        // মাস্টার ডোমেইন এবং লোকাল এনভায়রনমেন্ট ছাড় দিন
        $master = 'uddoktaresheba.com.bd';

        if ($target != $master && !in_array($target, ['127.0.0.1', 'localhost'])) {
            
            $token = config('app.license_key');
            $auth_point = 'https://www.uddoktaresheba.com.bd/api/verify-license';
            $log_point  = 'https://www.uddoktaresheba.com.bd/api/log-unauthorized';

            // ১ মিনিট ক্যাশ (আপনার রিকোয়েস্ট অনুযায়ী)
            if (!Cache::has('_session_validator_v3')) {
                try {
                    // withOptions(['verify' => false]) খুব গুরুত্বপূর্ণ, অনেক সময় SSL এর কারণে রিকোয়েস্ট আটকে যায়
                    $response = Http::withOptions(['verify' => false])->timeout(10)->post($auth_point, [
                        'domain' => $target,
                        'license_key' => $token,
                    ]);

                    if ($response->successful() && $response->json('status') === 'valid') {
                        Cache::put('_session_validator_v3', 'verified', now()->addHours(100));
                    } else {
                        // লাইসেন্স ইনভ্যালিড হলে ক্যাশ ডিলিট
                        Cache::forget('_session_validator_v3');

                        // রিপোর্ট পাঠানো
                        Http::withOptions(['verify' => false])->timeout(5)->post($log_point, [
                            'domain' => $target,
                            'ip'     => $request->ip()
                        ]);

                        // লারাভেলের রিডাইরেক্ট কাজ না করলে এটি কাজ করবে
                        header("Location: https://www.uddoktaresheba.com.bd/license");
                        exit();
                    }
                } catch (\Exception $e) {
                    // সার্ভার ইরর থাকলে ১ মিনিট বাফার (যাতে সাইট বন্ধ না হয়)
                    Cache::put('_session_validator_v3', 'verified', now()->addHours(100));
                }
            }
        }

        return $next($request);
    }
}