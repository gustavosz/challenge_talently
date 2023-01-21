<?php

namespace Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
    ];
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
    ];
    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory(): SupplierEloquentFactory
    {
        return SupplierEloquentFactory::new();
    }
}
