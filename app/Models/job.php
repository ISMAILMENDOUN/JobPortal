<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'requirements',
        'benefits',
        'salary',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function search($search)
    {
        return $this->where('title', 'LIKE', "%{$search}%")->get();
    }
    use HasFactory;
}
