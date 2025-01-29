<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Application as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_name',
        'order_type',
        'product_id',
        'applcation_id',
        'is_deleted',
    ];

    

}