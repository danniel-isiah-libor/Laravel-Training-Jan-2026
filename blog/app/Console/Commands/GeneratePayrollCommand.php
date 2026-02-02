<?php

namespace App\Console\Commands;

use App\Jobs\CalculatePayrollJob;
use Illuminate\Console\Command;

class GeneratePayrollCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:payroll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the payroll for employees';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Payroll generation started.');

        $this->line('Calculating salaries...');

        $this->alert('Payroll generation completed successfully!');

        $this->error('No actual payroll data processed.');

        $this->question('Do you want to review the payroll report?');

        dispatch(new CalculatePayrollJob());
    }
}
