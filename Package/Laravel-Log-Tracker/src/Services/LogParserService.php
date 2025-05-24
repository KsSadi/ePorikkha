<?php

namespace Kssadi\LogTracker\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LogParserService
{
    public function getLogFiles()
    {
        $logPath = storage_path('logs');
        $logFiles = File::files($logPath);

        return array_map(function ($file) {
            return $file->getFilename();
        }, $logFiles);
    }
    public function getLogEntries($logName, $page = 1, $perPage = 50)
    {
        $logFile = storage_path("logs/{$logName}");

        if (!File::exists($logFile)) {
            return [
                'entries' => [],
                'total' => 0,
                'current_page' => $page,
                'per_page' => $perPage,
                'last_page' => 1,
            ];
        }

        $logContents = File::get($logFile);
        $logLines = explode("\n", trim($logContents));
        $logLines = array_reverse($logLines); // Show newest logs first

        $entries = [];
        $currentEntry = null;

        foreach ($logLines as $line) {
            // Match Laravel log format: [timestamp] environment.LEVEL: message
            if (preg_match('/\[(.*?)\]\s(\w+)\.(\w+):\s(.*)/', $line, $matches)) {
                // Save previous entry before starting a new one
                if ($currentEntry) {
                    $entries[] = $currentEntry;
                }

                // Start new log entry
                $currentEntry = [
                    'timestamp' => $matches[1],
                    'level' => strtolower($matches[3]), // Extract log level correctly
                    'message' => $matches[4],
                    'stack' => '', // Stack trace will be collected separately
                ];
            } elseif ($currentEntry) {
                // This is part of a stack trace, append it to the last entry
                $currentEntry['stack'] .= "\n" . $line;
            }
        }

        // Save the last log entry
        if ($currentEntry) {
            $entries[] = $currentEntry;
        }

        return [
            'entries' => $entries,
            'total' => count($entries),
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => max(ceil(count($entries) / $perPage), 1),
        ];
    }


}
