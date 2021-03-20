<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CreditTransaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
