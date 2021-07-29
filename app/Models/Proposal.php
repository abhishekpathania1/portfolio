<?php

namespace App\Models;

use App\Models\UserPayment;
use App\Models\ProposalImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable=['portfolio_id','description','images','user_id'];

     public function proposalImages()
    {
        return $this->hasMany(ProposalImages::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userpayment()
    {
        return $this->hasOne(UserPayment::class);
    }
}