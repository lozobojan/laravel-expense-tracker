<?php

namespace App\Models;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSubtype extends Model
{
    use HasFactory, Taggable;
    protected $guarded = ['id'];

    public function expense_type(){
        return $this->belongsTo(ExpenseType::class);
    }
}
