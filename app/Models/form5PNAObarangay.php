<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form5PNAObarangay extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'form5_fields_content_PNAO';
    protected $guarded =  ['id'];
    protected $fillable = [
        'column1',
        'column2',
        'column3',
        'column4',
        'column5',
        'column6',
        'column7',
        'column8',
        'status',
        'remarks'
    ];
}
