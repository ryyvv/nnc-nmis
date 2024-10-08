<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionOfficesPersonnel extends Model
{
    use HasFactory;
    protected $table = 'nutrition_offices_personnel';
    protected $guarded = ['id'];
    protected $fillable = [
        'psgc_code',
        'name',
        'correspondence_code',
        'geographic_level',
        'income_classification',
        'reg_code',
        'prov_id',
        'citymun_code',
        'nutrition_office',
        'separate_nutrition_budget',
        'under_what_office',
        'pcnao',
        'pcnao_job_title',
        'pcnao_employment_status',
        'pcnao_salary_grade',
        'more_than_1_pcnao',
        'dcnpc',
        'dcnpc_job_title',
        'dcnpc_employment_status',
        'dcnpc_salary_grade',
        'more_than_1_dcnpc',
        'technical_support_staff',
        'admin_support_staff',
        'nha',
        'crown',
        'green_banner',
        'other_awards_received',
        'other_awards_received_date',
        'remarks'
    ];
    protected $casts = [
        'pcnao_salary_grade' => 'integer',
        'dcnpc_salary_grade' => 'integer',
        'technical_support_staff' => 'integer',
        'admin_support_staff' => 'integer',
        'nha' => 'date',
        'crown' => 'date',
        'green_banner' => 'date',
        'other_awards_received_date' => 'date',
    ];
}