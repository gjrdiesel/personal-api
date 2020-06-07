<?php

namespace App\Console\Commands;

use Facades\App\Models\DevPost;
use Facades\App\Models\MarkdownPost;
use Illuminate\Console\Command;

class PostsPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bring in the latest posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate', ['--force']);

        collect([
            DevPost::class,
            MarkdownPost::class
        ])->map(fn($class) => $class::fetch());
    }
}
