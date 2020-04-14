<?php


namespace App\Repositories\Admin;

use App\Contracts\ContratRepositories\Admin\ClientFilterContract;
use App\Filters\ClientFilters\Address;
use App\Filters\ClientFilters\CardNumber;
use App\Filters\ClientFilters\Email;
use App\Filters\ClientFilters\Id;
use App\Filters\ClientFilters\Name;
use App\Filters\ClientFilters\Phone;
use App\Http\Resources\ClientResource;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ClientFilterRepository implements ClientFilterContract
{
    use FormattedJsonResponse;

    public function generateResponse()
    {
       $pipeline =  app(Pipeline::class)
                        ->send(Client::query())
                        ->through([
                            Id::class,
                            Name::class,
                            Email::class,
                            Phone::class,
                            CardNumber::class,
                            Address::class
                    ])->thenReturn()
                      ->select('clients.*')
                      ->paginate(10);

       return $this->response('All clients by filters',200,
           ClientResource::collection($pipeline));
    }

    public function response(string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode, $data);
    }
}
