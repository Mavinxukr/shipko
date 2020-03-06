<?php

namespace App\Traits\Service\ClientService;

use App\Models\Notification\Notification;
use Illuminate\Support\Facades\Log;

trait NotificationService
{
    public function createNotification(int $client_id, string $type, string $body)
    {
        try {
            Notification::create([
                'client_id' => $client_id,
                'type'      => $type,
                'body'      => $body,
            ]);
        }catch (\Exception $e){
            Log::warning($e->getMessage());
        }
    }
}
