<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_id',
        'amount',
        'cheque_number',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function deposit($amount)
    {
        $this->account->balance += $amount;
        $this->account->save();
    }

}
