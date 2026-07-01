<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogService
{
    public function log(string $userId, string $activity, string $module, ?string $description = null, ?Request $request = null): ActivityLog
    {
        return ActivityLog::create([
            'user_id' => $userId,
            'activity' => $activity,
            'module' => $module,
            'description' => $description,
            'ip_address' => $request?->ip(),
            'user_agent' => $request?->userAgent(),
            'created_at' => now(),
        ]);
    }
}
