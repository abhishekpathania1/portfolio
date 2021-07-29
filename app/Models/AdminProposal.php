<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProposal extends Model
{
    use HasFactory;

    protected $fillable=['proposal_id','user_id','price','comments','status'];
}