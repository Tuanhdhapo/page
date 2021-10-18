<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'document_id',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_users', 'document_id', 'user_id')->withTimestamps();
    }

    public function scopeDocumentLearned($query, $lessonId)
    {
        $query->leftJoin('document_users', 'documents.id', 'document_users.document_id')
            ->select('document_users.user_id', 'document_users.document_id')
            ->where('document_users.user_id', '=', Auth::user()->id)
            ->where('documents.lesson_id', '=', $lessonId);
    }
}
