<?php

declare(strict_types=1);

namespace Presenters;

use App\Presenters\HomePresenter;
use Exception;
use PHPUnit\Framework\TestCase;

final class HomePresenterTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGeneratePrimes(): void
    {
        $presenter = new HomePresenter();

        $expectedPrimes = [2, 3, 5, 7, 11];
        $primes = $presenter->generatePrimes(5);
        $this->assertEquals($expectedPrimes, $primes);

        $primes = $presenter->generatePrimes(0);
        $this->assertCount(0, $primes);

        $primes = $presenter->generatePrimes(-1);
        $this->assertCount(0, $primes);

        // Test pro případ, kdy časový limit je překročen
//        $this->expectException(Exception::class);
//        $presenter->generatePrimes(1000000);
    }
}