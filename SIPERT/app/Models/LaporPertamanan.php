<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporPertamanan extends Model
{
    protected $table = 'lapor_pertamanan';
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
