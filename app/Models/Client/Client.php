<?php

namespace App\Models\Client;

use App\Models\Auto\Auto;
use App\Models\Part\Part;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * App\Models\Client\Client
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int $city_id
 * @property int $zip_id
 * @property int $address_id
 * @property int $card_number_id
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereCardNumberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereZipId($value)
 * @mixin \Eloquent
 * @property string $card_number
 * @property-read \App\Models\Client\Address|null $address
 * @property-read \App\Models\Client\City|null $city
 * @property-read \App\Models\Client\Country|null $country
 * @property-read \App\Models\Client\ClientImage $image
 * @property-read \App\Models\Client\Zip|null $zip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Client whereCardNumber($value)
 */
class Client extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected  $fillable = [
        'name','username','phone',
        'email','password','city_id',
        'zip_id','address_id',
        'country_id','card_number'
    ];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function zip()
    {
        return $this->belongsTo(Zip::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function image()
    {
        return $this->hasOne(ClientImage::class,'client_id');
    }

    public function checkPassword($password)
    {
        return \Hash::check($password, $this->password);
    }

    public function autos()
    {
        return $this->hasMany(Auto::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
