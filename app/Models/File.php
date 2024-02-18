<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class File extends Model
{
    use HasFactory, HasRoles;
    
    protected $fillable = [
        'file_name', 'period', 'year_info', 'type_file',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
