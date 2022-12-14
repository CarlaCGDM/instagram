<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //--------------------------------------------------------------------------------------------------------------CAMPOS RELLENABLES

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
		'surname',
		'nick',
        'bio',
        'email',
        'password',
        'avatar'
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
    ];


    //----------------------------------------------------------------------------------------------------------RELACIONES ENTRE TABLAS
    
    //Un usuario tiene muchas imágenes, likes y comentarios:

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
    public function likes(): HasMany {
        return $this->hasMany(Like::class);
    }
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function randomAvatar() {
         //imagen aleatoria
         $dir_path = public_path('sample_avatars');
         $files = scandir($dir_path);
         $count = count($files);
         $index = rand(2, ($count-1));
         $filename = $files[$index];
         return "sample_avatars/".$filename;
    }

}
