<?php

namespace Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent;

use Core\Ecommerce\Suppliers\Domain\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AuthUserEloquentModel extends Model
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
        'password' => 'string'
    ];
    public $incrementing = false;
    public $timestamps = false;

    protected static function newFactory(): AuthUserEloquentFactory
    {
        return AuthUserEloquentFactory::new();
    }

    public function supplier(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, 'supplier_user', 'user_id', 'supplier_id')
            ->withPivot('is_default');
    }
}
