<?php
declare(strict_types=1);

namespace ERM\App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    public $timestamps = true;

    public function logCreation(): void
    {
        if (property_exists($this, 'logger') && $this->logger) {
            $this->logger->info(static::class . " created", $this->attributesToArray());
        }
    }
}
