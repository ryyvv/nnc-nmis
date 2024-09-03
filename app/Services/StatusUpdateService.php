<?php

namespace App\Services;

class StatusUpdateService
{
    protected $models = [
        \App\Models\lnfp_form7::class,
        \App\Models\lnfp_form5a_rr::class,
        \App\Models\lnfp_formInterview::class,
        \App\Models\lnfp_form8::class,
        \App\Models\lnfp_lguprofile::class,
    ];

    protected $fieldNames = [
        \App\Models\lnfp_lguprofile::class => 'id',
        \App\Models\lnfp_form7::class => 'lnfp_lgu_id',
        \App\Models\lnfp_form5a_rr::class => 'lnfp_lgu_id',
        \App\Models\lnfp_formInterview::class => 'lnfp_lgu_id',
        \App\Models\lnfp_form8::class => 'lnfp_lgu_id',
    ];

    public function updateStatuses($lguId, $status = 1)
    {
        foreach ($this->models as $model) {
            $fieldName = $this->fieldNames[$model] ?? 'lnfp_lgu_id';
            $model::where($fieldName, $lguId)->update(['status' => $status]);
        }
    }
}