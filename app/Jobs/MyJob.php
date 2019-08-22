<?php

namespace App\Jobs;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    public $tries = 3;

    /**
     * @var string
     */
    protected $productTitle;

    private $mainProductRepository;

    /**
     * Create a new job instance.
     *
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param string $productTitle
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository ,string $productTitle)
    {
        $this->productTitle = $productTitle;
        $this->mainProductRepository = $mainProductRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $product = $this->mainProductRepository->where('title', [$this->productTitle])->first();
//        throw new \Exception('lol');
    }
}
