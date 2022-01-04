<?php

namespace App\Models;

use App\Models\Mycredit;
use App\Models\Othercredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";

    public function mycredit()
    {
        return $this->hasMany(Mycredit::class);
    }

    public function othercredit()
    {
        return $this->hasMany(Othercredit::class);
    }
}
