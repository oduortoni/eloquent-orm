<?php
declare(strict_types=1);

namespace ERM\Domains\Users;

use ERM\App\Models\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'pages_count',
        'isbn',
    ];

    public function author_id() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
