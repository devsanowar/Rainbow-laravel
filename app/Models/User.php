<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'system_admin',
    //     'phone',
    //     'image',
    // ];

    public const ROLE_MEMBER = 'Member';
    public const ROLE_ADMIN = 'Admin';
    public const ROLE_DEALER = 'Dealer';
    public const ROLE_CUSTOMER = 'Customer';

    protected $guarded = ['id'];

     public function division()
    {
        return $this->belongsTo(Division::class)->select(['id', 'name']);
    }

    public function district()
    {
        return $this->belongsTo(District::class)->select(['id', 'district_name']);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class)->select(['id', 'upazila_name']);
    }

    public function union()
    {
        return $this->belongsTo(Union::class)->select(['id', 'name']);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
