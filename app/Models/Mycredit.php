<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mycredit extends Model
{
    use HasFactory;

    protected $table = "my_credit";

    public function contact()
    {
        return $this->belongsTo(Contact::class,'contact_id');
    }
}
