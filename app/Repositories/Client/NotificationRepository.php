<?php

namespace App\Repositories\Client;

use App\Contracts\ContratRepositories\Client\NotificationContract;
use App\Http\Resources\NotificationResource;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class NotificationRepository implements NotificationContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        return $this->toJson('Client notifications successfully', 200,
                NotificationResource::collection($request->user()->notifications));
    }

    public function update(Request $request)
    {
        $request->user()
            ->notifications()
            ->whereIn('id', json_decode($request->id, 1))
            ->update(['is_new' => 0]);

        return $this->toJson('Client notification status update successfully', 200, null);
    }
}
