<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsGateway extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Reusable BulkSMSBD Integration Engine
     */
    public static function sendSMS($number, $message)
    {
        // 1. Fetch credentials saved from your Admin Panel
        $gateway = self::first();

        // 2. Safety check: Is the gateway enabled in your dashboard?
        if (!$gateway || !$gateway->status) {
            Log::warning("BulkSMSBD: Gateway is disabled or unconfigured in admin settings.");
            return false;
        }

        // 3. Ensure number format has the '88' country prefix BulkSMSBD requires
        if (!str_starts_with($number, '88')) {
            $number = '88' . ltrim($number, '0');
        }

        // 4. Fire the POST request using dynamically saved panel settings
        try {
            $response = Http::post('https://bulksmsbd.net/api/smsapi', [
                'api_key'  => $gateway->api_key, 
                'senderid' => $gateway->sender_id, // Grabs the column you just added!
                'number'   => $number,
                'message'  => $message,
            ]);

            if ($response->successful()) {
                $result = $response->json();
                if (isset($result['response_code']) && $result['response_code'] == 202) {
                    return true; // Delivery success!
                }
                Log::error("BulkSMSBD API Error: " . json_encode($result));
            }
        } catch (\Exception $e) {
            Log::error("BulkSMSBD Connection Failure: " . $e->getMessage());
        }

        return false;
    }
}