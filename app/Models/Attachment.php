<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function getDownloadLinkAttribute(){
        return Storage::url($this->file_path);
    }
}
