<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; // Assuming User model is in the same namespace as this model

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name',
                            'description',
                            'price',
                            'stock',
                            'photo'];

    public function user(){
        return $this->BelongsTo(User::class); // Assuming User model has 'id' as foreign key
    }
}
