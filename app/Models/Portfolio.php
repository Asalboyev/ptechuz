<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'portfolio_category_id',
        'title',
        'status',
        'view',
        'photo',
        'descriptions',

    ];
    protected $casts = [
        'title' => 'array',
        'descriptions' => 'array',
    ];
    public function portfolio_category()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}
