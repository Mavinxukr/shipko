<?php


namespace App\Repository\Admin;


use App\Contracts\Admin\ClientInterface;
use App\Contracts\vendor\ClientService\FileCreatorInterface;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client\Client;
use App\Repository\Admin\ClientService\FileRepository;
use App\Repository\Admin\ClientService\LocationServiceRepository;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientRepository implements ClientInterface
{
    use FormattedJsonResponse;
    private $location;
    private $file;

    public function __construct(LocationServiceRepository $location,
                                FileRepository $file)
    {
        $this->location = $location;
        $this->file     = $file;
    }

    public function response( string $message, int $statusCode, bool $statusBool, $data = null)
    {
        return $this->toJson($message,$statusCode,$statusBool,$data);
    }

    public function index()
    {
       return ClientResource::collection(
                    Client::latest('id')
                    ->paginate(10));

    }

    public function show(int $id)
    {
        $client = Client::findOrFail($id);
        return $this->response('Client get by id successfully',
            200,true, new ClientResource($client));
    }

    public function store(Request $request)
    {
        $country = $this->location->countryCreator($request->country);
        $city = $this->location->cityCreator($request->city);
        $zip = $this->location->zipCreator($request->zip);
        $address = $this->location->addressCreator($request->address);
        $client = Client::create($request->only(
            ['name','username','phone','email','card_number']) +
            [
                'password'      => bcrypt($request->password),
                'country_id'    => $country,
                'city_id'       => $city,
                'zip_id'        => $zip,
                'address_id'    => $address,
            ]);
         if ($request->file('image')){
             $this->file->imageCreator($client,'client',$request->image);
         }

         return $this->response('Client created successfully',
             201,true, new ClientResource($client));

    }

    public function update(Request $request, int $id)
    {
        $client = Client::findOrFail($id);
        $this->file->imageCreator($client,'client',$request->image);
        $client->update(
            array_filter($request->only(['name','username','phone','email','card_number']))
        );
        $client->password   =   bcrypt($request->password) ?? $client->password;

        $this->location->locationCreator($client,$request->only(['country','city','zip','address']));
        $client->save();

        return $this->response('Client updated successfully',
                            200,true, new ClientResource(Client::findOrFail($id)));

    }

    public function destroy(int $id)
    {
        $client =  Client::findOrFail($id);
        $this->file->imageDeleter($client);
        $this->file->folderDeleter($client,'client');
        $client->delete();

        return $this->response('Client deleted successfully',
            200,true);

    }

}
