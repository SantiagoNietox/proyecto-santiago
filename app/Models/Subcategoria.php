<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;



    protected $table = "subcategorias";
    protected $fillable = ['id','name','description','state','categoria_id'];

    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id');
}
}


