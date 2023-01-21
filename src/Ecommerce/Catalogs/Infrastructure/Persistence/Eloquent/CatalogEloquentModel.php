<?php

namespace Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class CatalogEloquentModel extends Model
{
    protected $table = 'catalogs';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'price',
    ];
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'price' => 'float',
        'supplier_id' => 'string',
    ];
    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory(): CatalogEloquentFactory
    {
        return CatalogEloquentFactory::new();
    }
}
