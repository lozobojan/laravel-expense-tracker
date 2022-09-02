<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function expense_subtypes(){
        return $this->hasMany(ExpenseSubtype::class);
    }
}
