<?php


namespace App\Repositories\Client;

use App\Contracts\ContratRepositories\Client\AuthContract;
use App\Contracts\ContratRepositories\Client\OverviewContract;
use App\Http\Resources\AuthResource;
use App\Http\Resources\ClientOverviewResource;
use App\Models\Auto\Auto;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\UserRepository;

class OverviewRepository implements OverviewContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        $user = $request->user();
        $autos = Auto::latest()->limit(6)->get();
        $client_autos = $user->autos()->with('shipping', 'invoice')->limit(6)->get();

        return $this->response('Get overview success',200,
            new ClientOverviewResource($user, $autos, $client_autos));
    }

    public function response( string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode,$data);
    }


}
