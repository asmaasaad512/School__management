<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function PaymentStudent()
    {
        return $this->belongsTo('App\Models\PaymentStudent','payment_id');
    }
    public function ReceiptStudent()
    {
        return $this->belongsTo('App\Models\ReceiptStudent','receipt_id');
    }
}
