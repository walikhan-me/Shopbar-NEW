<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    // Specify the primary key field if it's not 'id'
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'size',
        'color',         // Make sure this matches your column name
        'price',
        'quantity',
        'brand',
        'category',
        'material',
        'image_path',    // Use 'image_path' for the image field
    ];

    // Enable timestamps
    public $timestamps = true;
    
}
