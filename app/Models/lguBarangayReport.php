<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lguBarangayReport extends Model
{
    use HasFactory;

    protected $fillable = [

    'lguprofilebarangay_id',
    'lguprofilebarangayStatus_id',

    'mplgubrgyvisionmissions_id',
    'mplgubrgyvisionmissionsStatus_id',

    'mellpiprobarangaynationalpolicies_id',
    'mellpiprobarangaynationalpoliciesStatus_id',

    'mplgubrgygovernance_id',
    'mplgubrgygovernanceStatus_id',

    'mplgubrgylncmanagement_id',
    'mplgubrgylncmanagementStatus_id',

    'mplgubrgynutritionservice_id',
    'mplgubrgynutritionserviceStatus_id',

    'mplgubrgyb1bSummary_id',
    'mplgubrgyb1bSummaryStatus_id',

    'mplgubrgychangeNS_id',
    'mplgubrgychangeNSStatus_id',

    'mplgubrgyb2bSummary_id',
    'mplgubrgyb2bSummaryStatus_id',

    'mplgubrgydiscussionquestion_id',
    'mplgubrgydiscussionquestionStatus_id',

    'mplgubrgyb4Summary_id',
    'mplgubrgyb4SummaryStatus_id',

    'mplgubrgybudgetAIP_id',
    'mplgubrgybudgetAIPStatus_id',

    'count',
    'dateMonitoring',
    'periodCovereda', 
    'region_id',
    'province_id',
    'municipal_id',
    'barangay_id', 
    'user_id'
 ];

protected $guarded = ['id'];

protected $table = 'lgubarangayreport';
}
