<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;





class Image extends Model
{
    use HasFactory;

    //--------------------------------------------------------------------------------------------------------------CAMPOS RELLENABLES
    
    //Datos que permitimos rellenar (para evitar ataques de asignación masiva)
    protected $fillable = [
    "user_id",
    "image_path",
    "description"
    ];

    //Método de Laravel que se ejecuta cuando se instancia un modelo
    protected static function boot() {
        parent::boot();
        if(!app()->runningInConsole())
        {
            //Callback que recupera el ID del autor y lo relaciona con el user_id
            //El campo se rellena automáticamente con el id del usuario autenticado
            self::creating(function (Image $image) {
                $image->user_id = auth()->id();
            });    
        }
    }

    //----------------------------------------------------------------------------------------------------------------------PAGINACIÓN

    //Guardamos en una variable cuántas imágenes queremos mostrar por página
    protected $perPage = 20;

    //---------------------------------------------------------------------------------------------------------RELACIONES ENTRE TABLAS

    //Definimos la relación entre Imagen y Comentario:
    //Una imagen puede tener muchos comentarios pero un comentario está en una sola imagen, por lo que es una relación de uno a muchos.
    //Accediendo a la función comentarios, desde un objeto de tipo Imagen podremos saber todos los comentarios que se han dejado en esa imagen.
    public function comments(): HasMany {
    return $this->hasMany(Comment::class);
    }

    //La relación entre Imagen y Like es similar:
    public function likes(): HasMany {
        return $this->hasMany(Like::class);
    }

    //La relación entre Imagen y User:
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    //---------------------------------------------------------------------------------------------------------------FORMATO DE FECHAS

    //Ponemos la fecha y la hora en un formato legible para nosotros con la librería carbon
    public function getCreatedAtFormattedAttribute(): string {
    return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }

    //---------------------------------------------------------------------------------------------------------EXTRACTO DE DESCRIPCION

    //Si la descripción de la imagen es muy larga, vamos a mostrar sólo una parte
    public function getExcerptAttribute(): string {
        return Str::excerpt($this->content);
    }
        
}

