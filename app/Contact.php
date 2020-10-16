<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{

    use Searchable;

    //  disables mass assignment protection together
    protected $guarded = [];

    protected $dates = ['birthday'];

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    //  Know how to access its own resource
    public function path()
    {
        return '/contacts/' . $this->id;
    }

    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birthday like "%-' . now()->format('m') . '-%"');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
