<?php

namespace Hyder\DynamicFilter\Traits;

use Illuminate\Support\Facades\Schema;

trait Filters
{
    public function scopeFilters($query, array $filters, array $options = [])
    {
        $availableColumns =  $this->getAvailableColumns();

        foreach ($availableColumns as $column) {
            if (isset($filters[$column])) {
                $query->where($column, $filters[$column]);
            }
        }
        
        return $query;
    }

    private function getAvailableColumns(): array
    {
        return Schema::getColumnListing($this->getTable());
    }
}
