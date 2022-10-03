<?php

namespace App\Models;

use App\Models\Pipa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Olahan extends Model
{
    use HasFactory;

    protected $fillable = ['ntv_baku', 'ph_baku', 'ntv_sendimen', 'ph_sendimen', 'pipa_id', 'petugas'];

    /**
     * Get the pipa that owns the Olahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pipa()
    {
        return $this->belongsTo(Pipa::class);
    }
}
