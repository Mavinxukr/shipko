<?php


namespace App\Repositories\Client;

use App\Contracts\ContratRepositories\Client\AuthContract;
use App\Contracts\ContratRepositories\Client\OverviewContract;
use App\Http\Resources\AuthResource;
use App\Http\Resources\ClientOverviewResource;
use App\Models\Auto\Auto;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\UserRepository;

class OverviewRepository implements OverviewContract
{
    use FormattedJsonResponse, AutoAction;

    public function index(Request $request)
    {
        $user = $request->user();
        $autos = $this->getPopular(6);
        $client_autos_shipping = $user->autos()->whereHas('shipping', function (Builder $query){
            $query->whereNotNull('id');
        })->latest()->limit(6)->get();
        $client_autos_invoice = $user->autos()->whereHas('invoice', function (Builder $query){
            $query->whereNotNull('id');
        })->latest()->limit(6)->get();

        return $this->response('Get overview success',200,
            new ClientOverviewResource($user, $autos, $client_autos_shipping, $client_autos_invoice));
    }

    public function response( string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode,$data);
    }


}
