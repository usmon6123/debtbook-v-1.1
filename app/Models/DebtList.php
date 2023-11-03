<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DebtList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['debtor_id','debt_sum','in_or_out','seller_id','description','debtor'];

    public function debtor(){return $this->belongsTo(User::class);}
    public function seller(){return $this->belongsTo(User::class);}
}
