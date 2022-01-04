<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Othercredit extends Model
{
    use HasFactory;

    protected $table = "other_credit";

    public function contact()
    {
        return $this->belongsTo(Contact::class,'contact_id');
    }
}
