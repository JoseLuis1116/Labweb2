<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    // Definir los campos que se pueden llenar de manera masiva
    protected $fillable = ['sex_nombre'];  // Esto debe coincidir con las columnas de la tabla 'sexos'

    // Si tienes alguna relación, agrégala aquí (en este caso no hay ninguna en este ejemplo)
}
