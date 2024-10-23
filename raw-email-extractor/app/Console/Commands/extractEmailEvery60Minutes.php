<?php

namespace App\Console\Commands;
use App\Models\SuccessfulEmail;

use Illuminate\Console\Command;
use App\Helpers\EmailHelper;

class extractEmailEvery60Minutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:extract-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract raw email every hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch unprocessed emails from the database (if raw_text is empty, it is considered unprocessed)
        $emails = SuccessfulEmail::where('raw_text', '')->get();

        foreach ($emails as $email) {
            // Parse the email content
            $plainText = EmailHelper::extractPlainText($email->email);

            // Update the email record with the plain text
            $email->update([
                'raw_text' => $plainText,
            ]);
        }

        $this->info('Email extraction completed.');
    }
}
