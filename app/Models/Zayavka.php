<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Zayavka",
 *     required={"first_name", "last_name", "phone_number","descriptions","email","company",},
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="first_name", type="string", example="John"),
 *     @OA\Property(property="last_name", type="string", example="Doe"),
 *     @OA\Property(property="phone_number", type="string", example="+123456789"),
 *     @OA\Property(property="descriptions", type="string", example="vdfdfvfdv"),
 *     @OA\Property(property="email", type="string", example="ndc@gmail.com"),
 *     @OA\Property(property="company", type="string", example="NDC"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Zayavka extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','email','company', 'last_name', 'phone_number', 'descriptions', 'status'
    ];
}
