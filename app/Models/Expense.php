<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'date'];
    protected $with = ['expense_subtype', 'expense_subtype.expense_type', 'attachments']; // eager loading

    const DESC_TABLE_LENGTH = 25;
    const EXPENSIVE_THRESHOLD = 100;

    // lazy loading example
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getDateFormattedAttribute(){
        return $this->date->format('d.m.Y');
    }

    public function getAmountFormattedAttribute(){
        return number_format($this->amount, 2)." €";
    }

    // accessor
    public function getDescriptionTrimmedAttribute(){
        return strlen($this->description > self::DESC_TABLE_LENGTH)
            ? substr($this->description, 0, self::DESC_TABLE_LENGTH)."..."
            : $this->description;
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function expense_subtype(){
        return $this->belongsTo(ExpenseSubtype::class);
    }

    // mutator
    public function setAmountAttribute($value){
        if($value > 0) $this->attributes['amount'] = $value;
        else $this->attributes['amount'] = 0;
    }

//    local scope
//    public function scopeMine($query){
//        $query->where('user_id', auth()->id());
//    }

    // global scope
    protected static function booted()
    {
        static::addGlobalScope('mine', function(Builder $query){
            $query->where('user_id', auth()->id());
        });
    }

    // local scope
    public function scopeExpensive($query){
        $query->where('amount', '>=', self::EXPENSIVE_THRESHOLD);
    }

    public function scopeCheap($query){
        $query->where('amount', '<', self::EXPENSIVE_THRESHOLD);
    }


}
