<?php

namespace App\Repositories\Admin;

use App\Contracts\ContratRepositories\Admin\AutoNoteContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AutoNoteRepository implements AutoNoteContract
{
    use FormattedJsonResponse;

    public function store(Request $request)
    {
        $user = $request->user();
        $auto = Auto::findOrFail($request->auto_id);
        $auto->notes()->create([
            'client_id' => $user->id,
            'comment'   => $request->comment,
        ]);

        return $this->toJson('Auto note store success',201,
            new AutoResource($auto->fresh()));
    }
}
