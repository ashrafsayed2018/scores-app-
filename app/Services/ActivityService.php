<?php

namespace App\Services;

use App\ActivityLog;
use Jenssegers\Agent\Agent;

class ActivityService
{
    protected $activityLog;
    public function __construct(ActivityLog $activityLog)
    {
        $this->activityLog = $activityLog;
    }

    public function enterActivity($user_activity, $email, $user_id, $loggable_id = null, $loggable_type)
    {
        $agent = new Agent();
        $platform = $agent->platform();
        // Ubuntu, Windows, OS X, ...
        $browser = $agent->browser();
        // Chrome, IE, Safari, Firefox, ...
        $this->activityLog->create([
            'platform' => $agent->version($platform),
            'browser' => $agent->version($browser),
            'device' => $agent->device(),
            'ip_address' => request()->ip(),
            'user_id' => $user_id,
            'user_email' => $email,
            'user_activity' => $user_activity,
            'loggable_id' => $loggable_id,
            'loggable_type' => $loggable_type
        ]);
    }
}
