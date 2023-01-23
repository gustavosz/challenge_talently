<?php

namespace Core\Ecommerce\Catalogs\Infrastructure\Persistence\Eloquent;

use Core\Ecommerce\Catalogs\Domain\Catalog;
use Core\Ecommerce\Catalogs\Domain\CatalogId;
use Core\Ecommerce\Catalogs\Domain\CatalogName;
use Core\Ecommerce\Catalogs\Domain\CatalogPrice;
use Core\Ecommerce\Shared\Domain\SupplierId;
use Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent\SupplierEloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatalogEloquentModel extends Model
{
    use HasFactory;

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

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SupplierEloquentModel::class, 'supplier_id', 'id');
    }

    public function toDomain(): Catalog
    {
        return new Catalog(
            new CatalogId($this->id),
            new CatalogName($this->name),
            new CatalogPrice($this->price),
            new SupplierId($this->supplier_id)
        );
    }
}
