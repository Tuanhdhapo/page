<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DocumentUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "document_users";

    protected $fillable = [
        'document_id',
        'user_id'
    ];

    public function scopeLearned($query, $id)
    {
        if (Auth::check()) {
            $query->where('user_id', '=', Auth::user()->id)
                ->where('document_id', '=', $id);
        }
    }
}
