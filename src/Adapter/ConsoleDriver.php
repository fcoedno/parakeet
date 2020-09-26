<?php

declare(strict_types=1);

namespace Parakeet\Adapter;

use Parakeet\LogDriver;

class ConsoleDriver implements LogDriver
{
    public function log(string $level, string $message, array $context = []): void
    {
        $outputs = $this->parseOutput($level, $message, $context);
        $output = implode(' ', $outputs) . PHP_EOL;
        echo $output;
    }

    private function parseOutput(string $level, string $message, array $context): array
    {
        $context['level'] = $level;
        $context['message'] = $message;

        $outputs = [];

        foreach ($context as $key => $value) {
            $formatted = var_export($value, true);
            $outputs[] = "\e[32m{$key}:\e[0m {$formatted}";
        }

        return $outputs;
    }
}
