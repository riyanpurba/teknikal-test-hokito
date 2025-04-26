<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogHelper
{
    public static function log($action, $tableName, $recordId, $changes = null)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1, // Default ke 1 jika tidak ada auth
            'action' => $action,
            'table_name' => $tableName,
            'record_id' => $recordId,
            'changes' => $changes ? json_encode($changes) : null,
        ]);
    }
}
