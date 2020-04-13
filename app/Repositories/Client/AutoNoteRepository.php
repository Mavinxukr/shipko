<?php


namespace App\Repositories\Client;

use App\Contracts\ContratRepositories\Client\AuthContract;
use App\Contracts\ContratRepositories\Client\AutoNoteContract;
use App\Http\Resources\AuthResource;
use App\Http\Resources\AutoResource;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AutoNoteRepository implements AutoNoteContract
{
    use FormattedJsonResponse;

    public function store(Request $request)
    {
        $user = $request->user();
        $auto = $user->autos()->findOrFail($request->auto_id);
        $auto->notes()->create([
            'client_id' => $user->id,
            'comment'   => $request->comment,
        ]);

        return $this->toJson('Auto note store success',201,
            new AutoResource($auto->fresh()));
    }

    public function response( string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode,$data);
    }


}