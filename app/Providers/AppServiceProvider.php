<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // ✅ เพิ่มบรรทัดนี้
use Illuminate\Pagination\Paginator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(): void
    {
        // ❌ ลบบรรทัดนี้
        // Paginator::useTailwind(); 

        // ✅ ใช้อันนี้อันเดียวพอ
        Paginator::useBootstrapFive();

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }

}
