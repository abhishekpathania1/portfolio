<?php

namespace App\Models;

use App\Models\PortfolioImages;
use Illuminate\Database\Eloquent\Model;
use Czim\Paperclip\Model\PaperclipTrait;
use Czim\Paperclip\Contracts\AttachableInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;
    
    protected $fillable=['title','description','price'];
    public function portfolioImages()
    {
        return $this->hasMany(PortfolioImages::class,'portfolio_id');
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }
    
}