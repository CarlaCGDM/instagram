<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;
    
    //--------------------------------------------------------------------------------------------------------------CAMPOS RELLENABLES
    
    //Datos que permitimos rellenar (para evitar ataques de asignación masiva)
    protected $fillable = [
        "user_id",
        "image_id"
    ];

    //Método de Laravel que se ejecuta cuando se instancia un modelo
    protected static function boot() {
        parent::boot();
        if(!app()->runningInConsole())
        {
            //Callback que recupera el ID del autor y lo relaciona con el user_id
            //El campo se rellena automáticamente con el id del usuario autenticado
            self::creating(function (Like $like) {
            $like->user_id = auth()->id();
        });
        }
    }

    //----------------------------------------------------------------------------------------------------------RELACIONES ENTRE TABLAS

    //Definimos la relación entre Like e Imagen:
    //Un like se ha dejado en una única imagen, pero una imagen puede tener muchos likes (relación de muchos a uno).
    //Accediendo a la función images, desde un objeto de tipo Like podremos saber en que imagen se ha dejado ese like.
    public function image(): BelongsTo {
        return $this->belongsTo(Image::class);
    }
    
    //La relación entre Like y Usuario es similar:
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    //---------------------------------------------------------------------------------------------------------------FORMATO DE FECHAS

    //Ponemos la fecha y la hora en un formato legible para nosotros con la librería carbon
    public function getCreatedAtFormattedAttribute(): string {
    return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }
}
