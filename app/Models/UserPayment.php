<?php

namespace App\Models;

use App\Models\UserPaymentImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPayment extends Model
{
    use HasFactory;

    protected $fillable=['type','amount','images','proposal_id','user_id'];
   
    public function proposal()
{
    return $this->belongsTo(Proposal::class);
}

public function userpaymentimage(){
    return $this->hasOne(UserPaymentImage::class,'user_payment_id');
}
}