<?php

namespace App\Traits;

use App\Models\Section;

trait HasSections {
    public function sections() {
        return $this->morphMany(Section::class, 'sectionable');
    }
}
