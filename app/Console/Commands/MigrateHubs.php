<?php

namespace App\Console\Commands;

use App\Facades\RequestHub;
use App\Models\Hub;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MigrateHubs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:hubs {--id= : The minimum Hub ID to start from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for all Hubs from /database/migrations/update';

    protected $batch;
    protected $migrations = [];
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->batch = $this->getNextBatchNumber();
        $this->loadMigrations();

        $minId = $this->option('id');
        $query = Hub::query();
        
        if ($minId) {
            $query->where('id', '>=', $minId);
        }

        $hubs = $query->orderBy('id')->cursor();

        if(! count($this->migrations)) {
            $this->info('Nothing to migrate.');
            return 0;
        }

        foreach ($hubs as $hub) {
            $this->info("Processing Hub ID: {$hub->id}");

            $readonly = false; // remember if the hub is readonly
            if($hub->readonly) {
                // set to false to allow migrations
                $readonly = true;
                $hub->readonly = false; // not a real attribute
            }

            // run migrations
            RequestHub::setHubDB($hub->id);
            $this->runMigrationsForHub($hub);

            if ($readonly) {
                // set back to readonly
                RequestHub::setDefaultDB();
                $hub->readonly = true; // not a real attribute
            }
        }

        $this->recordExecutedMigrations();

        $this->info('All migrations completed.');
    }

    protected function loadMigrations()
    {
        $migrationPath = database_path('migrations/update');
        $migrationFiles = File::files($migrationPath);
        $executedMigrations = $this->getExecutedMigrations();

        foreach ($migrationFiles as $file) {
            $migrationName = pathinfo($file, PATHINFO_FILENAME);
            if (!in_array($migrationName, $executedMigrations)) {
                $this->migrations[$migrationName] = $file;
            }
        }

        $this->info("Loaded " . count($this->migrations) . " migrations.");
    }

    protected function runMigrationsForHub($hub)
    {
        foreach ($this->migrations as $migrationName => $file) {
            $this->info("Running migration: {$migrationName} for Hub ID: {$hub->id}");

            try {
                $migration = require $file;
                $migration->up();
                
            } catch (\Exception $e) {
                $this->error("Failed to run migration {$migrationName} for Hub ID {$hub->id}: " . $e->getMessage());
            }
        }
    }

    protected function getExecutedMigrations()
    {
        RequestHub::setDefaultDB();
        return DB::table('hub_migrations')
            ->pluck('migration')
            ->toArray();
    }

    protected function getNextBatchNumber()
    {
        RequestHub::setDefaultDB();
        return DB::table('hub_migrations')->max('batch') + 1;
    }

    protected function recordExecutedMigrations()
    {
        RequestHub::setDefaultDB();
        
        $this->info("Recording executed migrations...");

        $executedMigrations = [];
        foreach ($this->migrations as $migrationName => $file) {
            $executedMigrations[] = [
                'migration' => $migrationName,
                'batch' => $this->batch,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        DB::table('hub_migrations')->insert($executedMigrations);
        
        $this->info("Recorded " . count($executedMigrations) . " migrations.");
    }
}