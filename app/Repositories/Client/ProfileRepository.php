<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\ProfileContract;
use App\Facades\Clients\LocationFacade;
use App\Http\Resources\ClientResource;
use App\Models\Client\ClientImage;
use App\Traits\FormattedJsonResponse;
use App\Traits\GetAdditional;
use App\Traits\Service\ClientService\FileService;
use Illuminate\Http\Request;

class ProfileRepository implements ProfileContract
{
    use FormattedJsonResponse, FileService;

    public function index(Request $request)
    {
        return $this->toJson('Client get by id successfully', 200,
            (new ClientResource($request->user()))->additional($this->getAdditional()));
    }

    public function update(Request $request)
    {
        $client = $request->user();

        if($request->has('password') && !is_null($request->password)){
            if($client->checkPassword($request->old_password)){
                $client->update(['password' => bcrypt($request->password)]);
            }else{
                return $this->toJson('Password not correct',
                    400, null);
            }
        }

        $client->update(
            array_filter($request->only(['name','phone','username','email','card_number']))
        );

        if(!empty(array_filter($request->only(['country','city','zip','address'])))){
            $location =  LocationFacade::resultCreator($request->only(['country','city','zip','address']));
            $client->update($location);
        }

        $client->save();

        if (!empty($request->image)){
            $this->imageDeleter($client);
            $this->imageCreator($client,'client',new ClientImage ,$request->image);
        }

        return $this->toJson('Client updated successfully', 200,
            new ClientResource($client->fresh()));
    }

    public function getAdditional()
    {
        return GetAdditional::get(['cities', 'states']);
    }
}
