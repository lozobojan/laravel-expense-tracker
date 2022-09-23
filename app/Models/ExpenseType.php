<?php

namespace App\Models;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseType extends Model
{
    use HasFactory, SoftDeletes, Taggable;
    protected $guarded = ['id'];

    public function expense_subtypes(){
        return $this->hasMany(ExpenseSubtype::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
