<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Middleware;

class ShareCartItems extends Middleware
{
	public function handle(Request $request, Closure $next)
	{
		Inertia::share([
			'cartItems' => function () use ($request) {
				$user = auth()->user();

				if (!$user) {
					return [];
				}

				$cart = $user->cart()->with('items.product')->first();
				$cartItems = $cart ? $cart->items : [];
				return $cartItems ?? [];
			},
		]);

		return $next($request);
	}
}
