<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'idOfficeOrigin',
        'email',
        'password',
        'user_image',
        'bio',
        'remember_token',
        'archive',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getImageURL()
    {
        if ($this->user_image) {
            return url('storage/' . $this->user_image); //the user_image is a column in the database
        }

        return "https://api.dicebear.com/7.x/fun-emoji/svg?{{$this->name}"; // Generate avatar based on the user's name
    }

    static public function getEmailCheck($email)
    {
        return self::where("email", '=', $email)->first();
    }


    // "https://api.dicebear.com/7.x/fun-emoji/{$this->name}.svg incase it might not work
}
