<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConnectPassportFiles extends Command
{
    protected $signature = 'passport:connect';
    protected $description = 'Connect passport files with employee IDs';

    public function handle()
    {
        $directory = 'D:\Passport';
        $files = scandir($directory);
        $mapping = [];
        $skippedFiles = [];

        $this->info('Scanning passport directory...');

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && is_file($directory . '\\' . $file)) {
                $employeeId = $this->getEmployeeId($file);
                if ($employeeId) {
                    $mapping[] = [
                        'employee_id' => $employeeId,
                        'file_name' => $file,
                        'file_path' => $directory . '\\' . $file,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } else {
                    $skippedFiles[] = $file;
                }
            }
        }

        $this->info('Saving mapping to database...');

        if (!empty($mapping)) {
            try {
                DB::beginTransaction();
                DB::table('passport_files')->truncate(); // Clear existing data
                foreach (array_chunk($mapping, 100) as $chunk) {
                    DB::table('passport_files')->insert($chunk);
                }
                DB::commit();
                $this->info('Mapping completed. ' . count($mapping) . ' files processed.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Error inserting passport files: ' . $e->getMessage());
                $this->error('An error occurred while saving the mapping. Check the logs for details.');
            }
        } else {
            $this->warn('No valid files found to process.');
        }

        if (!empty($skippedFiles)) {
            $this->warn('The following files were skipped (no valid employee ID found):');
            foreach ($skippedFiles as $file) {
                $this->line($file);
            }
        }
    }

    private function getEmployeeId($filename)
    {
        // Adjust this regex pattern based on your filename format
        if (preg_match('/(\d+)/', $filename, $matches)) {
            return $matches[1];
        }
        return null;
    }
}