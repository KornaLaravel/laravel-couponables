<?php

declare(strict_types=1);

namespace MichaelRubel\Couponables\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MichaelRubel\Couponables\Models\Contracts\CouponPivotContract;
use MichaelRubel\EnhancedContainer\Call;

trait DefinesModelRelations
{
    /**
     * Fetch the latest couponables - redeemed coupon records.
     *
     * @return HasMany
     */
    public function couponables(): HasMany
    {
        $pivot = call(CouponPivotContract::class);

        return $this
            ->hasMany($pivot->getInternal(Call::INSTANCE))
            ->orderBy($pivot->getRedeemedAtColumn(), 'desc');
    }

    /**
     * The only model allowed to redeem the coupon.
     *
     * @return Model|null
     */
    public function redeemer(): ?Model
    {
        return $this->morphTo()->first();
    }
}
