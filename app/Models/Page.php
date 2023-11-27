<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $table = 'pages';
   protected $primaryKey = 'pageid';
   protected $fillable = ['title', 'slug', 'lide', 'description', 'image', 'status', 'is_recente'];
}
