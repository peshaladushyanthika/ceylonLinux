<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\Distributor;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        $zones = Zone::pluck('zone_long_name');
        $regions = Region::orderBy('region_name')
            ->distinct('region_name')
            ->pluck('region_name');
        $territories = Territory::orderBy('territory_name')
            ->distinct('territory_name')
            ->pluck('territory_name');
        $distributors = Distributor::orderBy('name')
            ->distinct('name')
            ->pluck('name');
        return view('user.dashboard', compact('zones', 'regions', 'territories', 'distributors'));
    }
    public function createOrder(Request $request)
    {
        $nextPoNumber = Order::max('po_number') + 1;
        $orders = new Order([
            'region_name' => $request->input('region_name'),
            'territory_name' => $request->input('territory_name'),
            'distributor_name' => $request->input('distribution_name'),
            'total_price' => $request->input('totalPrice'),
            'date' => now()->toDateString(),
            'time' => now()->toTimeString(),
            'po_number' => 'PO' . str_pad($nextPoNumber, 3, '0', STR_PAD_LEFT),
        ]);
        $orders->save();
        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Order added successfully!');
    }
    public function viewOrder()
    {
        $orders = Order::all();
        $regions = Region::orderBy('region_name')
            ->distinct('region_name')
            ->pluck('region_name');
        $territories = Territory::orderBy('territory_name')
            ->distinct('territory_name')
            ->pluck('territory_name');
        return redirect()->route('user.order', compact('orders', 'regions', 'territories'));
        //dd($territories);
    }
}
