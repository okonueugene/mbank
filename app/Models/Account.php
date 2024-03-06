<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    // $table->foreignId('user_id')->constrained()->onDelete('cascade');
    // $table->string('balance')->default(0);

    protected $fillable = [
        'user_id',
        'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
        $this->save();
    }
}
