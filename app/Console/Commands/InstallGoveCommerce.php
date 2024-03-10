<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class InstallGoveCommerce extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:gove-commerce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command installs Gove-Commerce';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Set wordpress path
        $wordpress_path = base_path('wordpress');

        $commands = [
            'composer install',
            'npm install',
            ['git clone https://github.com/WordPress/WordPress.git wordpress', File::exists($wordpress_path), 'Wordpress directory already exists!'],
            'php artisan storage:link',
        ];

        if (is_callable('exec') && false === stripos(ini_get('disable_functions'), 'exec')) {
            foreach ($commands as $command) {
                if (is_array($command)) {
                    $condition = $command[1];
                    $message = $command[2];
                    $command = $command[0];

                    if (!$condition) {
                        $this->info('Executing Command: '.$command);
                        exec("$command", $output2 , $status);
                    } else {
                        $this->warn($message);
                    }
                } else {
                    $this->info('Executing Command: '.$command);
                    exec("$command", $output2 , $status );
                }
            }
        } else {
            $this->warn('exec function is not enabled for this project. Please check.');
            $confirmation = $this->confirm('Do you want to continue installation of this project and run dependencies command manually?', 'yes');
            if (! $confirmation) {
                $this->error('Aborting installation!');
                return Command::FAILURE;
            }
        }

        // Check if wordpress folder exists
        if (! File::exists($wordpress_path)) {
            $this->error('Please install wordpress first!');
            return Command::FAILURE;
        }

        // Initialise Zip
        $zip  = new ZipArchive();

        // Begin extracting theme files
        $theme_zip = storage_path('wp-files/laravel-custom-theme.zip');

        if (! File::exists($theme_zip)) {
            $this->error('Theme Zip File Missing!');
            return Command::FAILURE;
        }

        $status = $zip->open($theme_zip);
        if (empty($status)) {
            $this->error('Themes Zip File Corrupted!');
            return Command::FAILURE;
        }
        $zip->extractTo($wordpress_path.'/wp-content/themes');
        $zip->close();

        $this->info('Gove-Commerce Theme Installed!');
        // End extracting theme files

        // Begin extracting plugin files
        $plugins_zip = storage_path('wp-files/laravel-custom-plugins.zip');
        if (! File::exists($plugins_zip)) {
            $this->error('Plugins Zip File Missing!');
            return Command::FAILURE;
        }
        $status = $zip->open($plugins_zip);
        if (empty($status)) {
            $this->error('Plugins Zip File Corrupted!');
            return Command::FAILURE;
        }
        $zip->extractTo($wordpress_path.'/wp-content/plugins');
        $zip->close();

        $this->info('Gove-Commerce Plugins Installed!');
        // End extracting plugin files


        // Check if user wants to manually run the commands as prompted above on Line: #45
        if (isset($confirmation)) {
            $commands_run_confirmation = false;
            while (! $commands_run_confirmation) {
                $commands_run_confirmation = $this->commandRun('You will now be asked to run the commands manually one by one. Please open a new terminal and put the commands one by one. Are you ready?');
            }
            $total_commands = count($commands);
            foreach ($commands as $i => $command) {
                if (is_array($command)) {
                    $command = $command[0];
                }
                $this->info($command);
                if ($i === 0) {
                    $this->commandRun('Great! Please start by copying and pasting the command above in the new terminal you just opened.');
                } elseif ($total_commands - 1 === $i) {
                    $this->commandRun('Well done until now. Please execute this last command and the process will complete.');
                } else {
                    $this->commandRun('Press enter when the command above is successfully executed.');
                }
            }
        }

        return Command::SUCCESS;
    }

    private function commandRun($command): bool
    {
        return $this->confirm($command, 'yes');
    }
}
