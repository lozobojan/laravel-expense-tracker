<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'date'];
    const DESC_TABLE_LENGTH = 25;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getDateFormattedAttribute(){
        return $this->date->format('d.m.Y');
    }

    public function getAmountFormattedAttribute(){
        return number_format($this->amount, 2)." €";
    }

    public function getDescriptionTrimmedAttribute(){
        return strlen($this->description > self::DESC_TABLE_LENGTH)
            ? substr($this->description, 0, self::DESC_TABLE_LENGTH)."..."
            : $this->description;
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

}
