<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Permission\Traits\HasRoles;



class Section extends Model
{
    use HasFactory, HasRoles;

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'section_name',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    
}
