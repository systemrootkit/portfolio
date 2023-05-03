<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinks extends Model
{
    use HasFactory;
    protected $table='social_links';
    protected $fillable = ['git','linkedin','instagram','facebook','twitter','user_id'];
}
