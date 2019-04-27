<?php

namespace App\Http\Composers\Frontend;

use App\Models\Passenger\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

/**
 * Class DashboardComposer.
 */
class DashboardComposer
{

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view
            ->with('rides', Book::query()->where(['status' => 1, 'kind' => 0])->where('created_at', '>=', now()->startOfDay())->get())
            ->with('goods', Book::query()->where(['status' => 1, 'kind' => 1])->where('created_at', '>=', now()->startOfDay())->get())
            ->with('bookings', Book::query()->where(['status' => 1, 'kind' => 0])->where('created_at', '>=', now()->startOfDay())->whereHas('ride', function (Builder $booking){
                $booking->where(['user_id' => auth()->id()]);
            })->get())
            ->with('parcels', Book::query()->where(['status' => 1, 'kind' => 1])->where('created_at', '>=', now()->startOfDay())->whereHas('ride', function (Builder $booking){
                $booking->where(['user_id' => auth()->id()]);
            })->get());
    }
}
