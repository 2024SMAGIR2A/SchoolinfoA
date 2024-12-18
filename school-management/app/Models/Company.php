<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    
    use HasFactory;
    use SoftDeletes;

    /** 
     * The attributes that are mass assignable. 
     * 
     * @var array 
    */ 
    public $fillable = [ 
        'name',
        'acronym',
        'email',
        'phone',
        'mobile',
        'bp',
        'address',
        'facebook',
        'twitter',
        'linkedin',
        'logo',
        'rccm',
        'ncc',
        'idu',
        'bban',
        'iban',
        'tax_office',
    ]; 

    public $timestamps = true;

}
