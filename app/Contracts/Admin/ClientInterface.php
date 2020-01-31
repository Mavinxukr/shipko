<?php


namespace App\Contracts\Admin;


use App\Contracts\vendor\FormattedInterface;
use App\Contracts\vendor\ClientService\LocationServiceInterface;
use App\Contracts\vendor\TemplateInterface;
use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ClientInterface extends FormattedInterface, TemplateInterface
{
}
