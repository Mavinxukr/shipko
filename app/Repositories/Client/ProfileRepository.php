<?php


namespace App\Repositories\Client;

use App\Contracts\ContratRepositories\Client\ProfileContract;
use App\Facades\Clients\LocationFacade;
use App\Http\Resources\ClientResource;
use App\Models\Client\ClientImage;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\ClientService\FileService;
use Illuminate\Http\Request;

class ProfileRepository implements ProfileContract
{
    use FormattedJsonResponse, FileService;

    public function index(Request $request)
    {
        return $this->toJson('Client get by id successfully', 200,
                new ClientResource($request->user()));
    }

    public function update(Request $request)
    {
        $client = $request->user();
        $location =  LocationFacade::resultCreator($request->only(['country','city','zip','address']));
        $client->update(
            array_filter($request->only(['name','phone','email','card_number'])) +
            $location);
        $client->save();

        if (!empty($request->image)){
            $this->imageDeleter($client);
            $this->imageCreator($client,'client',new ClientImage ,$request->image);
        }

        return $this->toJson('Client updated successfully',
                                    200, new ClientResource($client));

    }


    public function updatePassword(Request $request)
    {
        $client = $request->user();

        if($client->checkPassword($request->old_password)){
            $client->update(['password' => bcrypt($request->password)]);

            return $this->toJson('Client password updated successfully',
                200, null);
        }

        return $this->toJson('Entered not correct',
            400, null);
    }
}
