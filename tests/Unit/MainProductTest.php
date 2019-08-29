<?php

namespace Tests\Unit;

use App\Repository\MainProductRepository\MainProductRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $mainProductRepository = $this->app->make(MainProductRepository::class);
        $mainProduct = $mainProductRepository->find(1);
        $response = $this->get('/test');
        $this->assertTrue(true);
    }
}
