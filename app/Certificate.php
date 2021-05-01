<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'event_id',
        'recipient_name',
        'recipient_designation',
        'recipient_org',
        'remarks',
        'issued_by',
        'issued_at'];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function issuer() {
        return $this->belongsTo('App\User','issued_by','id');
    }
}
