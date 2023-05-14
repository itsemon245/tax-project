<?php

namespace App\Models;

use App\Models\UserDoc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentType extends Model
{
    use HasFactory;

    public function userDocs()
    {
        return $this->hasMany(UserDoc::class);
    }
}
