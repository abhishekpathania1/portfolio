<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProposalImage extends Model
{
    use HasFactory;
    protected $fillable=['admin_proposal_id','images'];
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

}