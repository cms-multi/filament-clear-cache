<?php

namespace CmsMulti\FilamentClearCache\Tests\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthorizableContract, AuthenticatableContract, FilamentUser
{
    use HasFactory;
    use Authorizable;
    use Authenticatable;

    //protected $fillable = ['email', 'name'];
    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'users';

    public function canAccessFilament(): bool
    {
        return true;
    }
}
