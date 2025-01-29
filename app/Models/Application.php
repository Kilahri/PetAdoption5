<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Application as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'application';
    protected $primaryKey = 'application_id';
    protected $fillable = [
        'name',
        'email',
        'address',
        'reason',
        'product_id',
        'status',
        'due_date',
        'is_deleted',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    
    public function products()
    {
        return $this->hasOne('App\Models\Products', 'product_id','application_id');

        
    }

    public function orders()
    {
        return $this->hasOne('App\Models\Order', 'order_id','application_id');
    }


}



