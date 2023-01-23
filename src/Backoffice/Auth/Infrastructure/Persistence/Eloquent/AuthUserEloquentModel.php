<?php

namespace Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent;

use Core\Ecommerce\Suppliers\Infrastructure\Persistence\Eloquent\SupplierEloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AuthUserEloquentModel extends Authenticatable implements JWTSubject
{
    protected $table = 'users';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'email',
        'password'
    ];
    protected $casts = [
        'id' => 'string',
        'email' => 'string',
    ];
    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory(): AuthUserEloquentFactory
    {
        return AuthUserEloquentFactory::new();
    }

    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(SupplierEloquentModel::class, 'supplier_user', 'user_id', 'supplier_id')
            ->withPivot('is_default');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
