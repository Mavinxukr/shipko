<?php

namespace App\Http\Controllers\ApiClient\Notification;

use App\Contracts\ContratRepositories\Client\NotificationContract;
use App\Http\Controllers\Controller;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\ClientService\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use NotificationService, FormattedJsonResponse;

    private $notification;

    public function __construct(NotificationContract $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @api {get} client/notifications  Show all notifications
     * @apiName Show all notifications
     * @apiVersion 1.1.1
     * @apiGroup  Client Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/notifications
     */
    public function index(Request $request)
    {
        return $this->notification->index($request);
    }

    /**
     * @api {post} client/notifications/create  Create notification
     * @apiName Create notification
     * @apiVersion 1.1.1
     * @apiGroup  Client Action
     * @apiParam type Type (auto, auto_for_dismanting, parts, shipping, invoices)
     * @apiParam body Notification body
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/notifications/create
     */
    public function store(Request $request)
    {
        $this->createNotification($request->user()->id,
            $request->type, $request->body);

        return $this->toJson('Notification create success',200, null);
    }

    /**
     * @api {post} client/notifications  Update notifications status
     * @apiName Update notifications status
     * @apiVersion 1.1.1
     * @apiGroup  Client Action
     * @apiParam id Notifications ID example: ["1", "2", "3"]
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/notifications
     */
    public function update(Request $request)
    {
        return $this->notification->update($request);
    }
}
