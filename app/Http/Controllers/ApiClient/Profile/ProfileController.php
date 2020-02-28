<?php

namespace App\Http\Controllers\ApiClient\Profile;

use App\Contracts\ContratRepositories\Client\ProfileContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $client;

    public function __construct(ProfileContract $client)
    {
        $this->client = $client;
    }

    /**
     * @api {get} client/get-profile  Show Profile
     * @apiName Show Profile
     * @apiVersion 1.1.1
     * @apiGroup Client Action
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-profile
     */

    public function index(Request $request)
    {
        return $this->client->index($request);
    }

    /**
     * @api {post} client/update-profile  Update Profile
     * @apiName Update Profile
     * @apiVersion 1.1.1
     * @apiGroup Client Action
     * @apiPermission Authorization
     * @apiParam {String} name Name
     * @apiParam {String} username Username
     * @apiParam {String} phone Phone exp - +380-00-00-00-000
     * @apiParam {String} email Email
     * @apiParam {String} country Country
     * @apiParam {String} city City
     * @apiParam {String} zip Zip
     * @apiParam {String} address Address
     * @apiParam {String} card_number Card number exp - 1234-1234-1234-1234
     * @apiParam {File} image Client image
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/update-profile
     */

    public function update (UpdateClientRequest $request)
    {
        return $this->client->update($request);
    }

    /**
     * @api {post} client/update-profile-password  Update Profile Password
     * @apiName Update Profile Password
     * @apiVersion 1.1.1
     * @apiGroup Client Action
     * @apiParam {String} old_password Current Password
     * @apiParam {String} password New Password
     * @apiParam {String} password_confirmation Password confirmation
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/update-profile-password
     */

    public function updatePassword (Request $request)
    {
        return $this->client->updatePassword($request);
    }


}
