<?php

namespace App\Models;

use App\Models\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioImages extends Model implements \Czim\Paperclip\Contracts\AttachableInterface
{
    use HasFactory;
    use \Czim\Paperclip\Model\PaperclipTrait;
    protected $fillable=['portfolio_id' ,'images'];

    protected $appends  = ['image'];

    
    public function __construct(array $attributes = [])
    {
        $this->hasAttachedFile('images', [
            // 'variants' => [
            //     'medium' => [
            //         'auto-orient' => [],
            //         'resize'      => ['dimensions' => '300x300'],
            //     ],
            //     'thumb' => '100x100',
            //     'type' => 'image'
            // ],
            // 'attributes' => [
            //     'variants' => false,
            // ],
        ]);

        parent::__construct($attributes);
    }


    public function getImageAttribute(){
        return $this->images->url(); 
    }


    public function portfolio(){
        return $this->belongsTo(Portfolio::class,'id')->withTimestamps();
    }
    
}