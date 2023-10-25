<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtList extends Model
{
    use HasFactory;

    protected $fillable = ['debtor','debt_sum','in_or_out','seller','description'];

    public function debtor(){return $this->belongsTo(User::class);}
    public function seller(){return $this->belongsTo(User::class);}
}
