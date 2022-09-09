<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }
}
