<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin\Coupon;
use Carbon\Carbon;

class UpdateCouponContDate extends Command
{
    protected $signature = 'coupons:update-cont-date';
    protected $description = 'Update cont_date of coupons based on the current date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $coupons = Coupon::all();
        $currentDate = Carbon::now()->format('Y-m-d');

        foreach ($coupons as $coupon) {
            if ($currentDate >= $coupon->start_date && $currentDate <= $coupon->end_date) {
                $coupon->cont_date = '1';
            } else {
                $coupon->cont_date = '0';
            }
            $coupon->save();
        }

        $this->info('Coupon cont_date updated successfully.');
    }
}

