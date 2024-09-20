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
        'remarks',
        'belongTo',
    ];

    // Method to get records based on the user's role
    public static function getByUserRole($userRole)
    {
        // Map roles to 'belongTo' values
        $roleToBelongToMap = [
            'BNS' => 1,
            'CMNAO' => 2
        ];

        // Check if the role is mapped
        if (array_key_exists($userRole, $roleToBelongToMap)) {
            return self::where('belongTo', $roleToBelongToMap[$userRole])
                        ->orderBy('id', 'ASC')
                        ->get();
        }

        // Return an empty collection if no role match is found
        return collect();
    }
}
