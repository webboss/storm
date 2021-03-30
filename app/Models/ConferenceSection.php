<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceSection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'parent_id'];
}
