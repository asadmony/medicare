<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function messageable()
    {
        return $this->morphTo();
    }
    public function userFrom()
    {
        return $this->belongsTo('App\Model\User', 'userfrom_id');
    }
    public function userTo()
    {
        return $this->belongsTo('App\Model\User', 'userto_id');
    }
    public function conversation($userto,$userfrom)
    {
        $messages = Message::where([
                ['userto_id', '=', $userto],
                ['userfrom_id', '=',  $userfrom]
            ])->orWhere([
                ['userto_id', '=', $userfrom],
                ['userfrom_id', '=',  $userto]
            ])
        ->latest()
        ->simplePaginate(400);
        return $messages;
    }
    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }
}
