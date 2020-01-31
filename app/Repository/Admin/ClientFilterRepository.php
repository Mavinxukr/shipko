<?php


namespace App\Repository\Admin;


use App\Contracts\Admin\ClientFilterInterface;
use App\Http\Resources\ClientResource;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClientFilterRepository implements ClientFilterInterface
{
    use FormattedJsonResponse;

    public function generateResponse(Request $request)
    {
       $clients = Client::query();
       if (!empty($request->id))     $clients = $this->byId($clients,$request->id);
       if (!empty($request->name))   $clients = $this->byName($clients,$request->name);
       if (!empty($request->email))  $clients = $this->byEmail($clients,$request->email);
       if (!empty($request->phone))  $clients = $this->byPhone($clients,$request->phone);
       if (!empty($request->address))$clients = $this->byAddress($clients,$request->address);
       if (!empty($request->card))   $clients = $this->byCreditCard($clients,$request->card);
       $clients->select('clients.*')->get();

       return $this->response('All clients by filters',200,true,
                                         ClientResource::collection($clients->get()));
    }

    public function byId(Builder $builder,int $id)
    {
        return $builder->where('clients.id',$id);
    }

    public function byName(Builder $builder,string $name)
    {
        return $builder->where('clients.name',$name);
    }

    public function byEmail(Builder $builder,string $email)
    {
        return $builder->where('clients.email',$email);
    }

    public function byPhone(Builder $builder,string $phone)
    {
        return $builder->where('clients.phone',$phone);
    }

    public function byAddress(Builder $builder,string $address)
    {
        return $builder->join('addresses','clients.address_id','=','addresses.id')
                ->where('addresses.name','LIKE','%'.$address.'%');
    }

    public function byCreditCard(Builder $builder,string $card)
    {
        return $builder->where('clients.card_number',$card);
    }

    public function response(string $message, int $statusCode, bool $statusBool, $data = null)
    {
        return $this->toJson($message,$statusCode,$statusBool, $data);
    }
}
