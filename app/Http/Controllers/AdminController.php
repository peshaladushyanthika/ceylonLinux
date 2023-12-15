<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Region;
use App\Models\Territory;
use App\Models\Distributor;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showZoneForm()
    {
        return view('admin.zone');
    }

    public function createZone(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'zone_long_name' => 'required|string',
            'zone_short_name' => 'required|string',
        ]);
        $zone = new Zone([
            'zone_long_name' => $request->input('zone_long_name'),
            'zone_short_name' => $request->input('zone_short_name'),
        ]);

        // Save the record to the database
        $zone->save();

        return redirect()
            ->route('admin.zone')
            ->with('success', 'Zone added successfully!');
    }
    public function showCreateRegionForm()
    {
        $zones = Zone::pluck('zone_long_name', 'id'); // Get all zone names and their corresponding IDs
        return view('admin.region', compact('zones'));
    }
    public function createRegion(Request $request)
    {
        // Validate the form data
        $request->validate([
            'zone_id' => 'required|exists:zones,id',
            'region_name' => 'required|string',
        ]);

        // Get the zone details
        $zone = Zone::find($request->input('zone_id'));

        // Create a new Region model instance
        $region = new Region([
            'zone_id' => $zone->id,
            'zone_long_name' => $zone->zone_long_name,
            'region_name' => $request->input('region_name'),
        ]);

        // Save the record to the database
        $region->save();

        // Redirect back with a success message
        return redirect()
            ->route('admin.region')
            ->with('success', 'Region added successfully!');
    }

    public function showCreateTerritoryForm()
    {
        $zones = Zone::orderBy('zone_long_name')
            ->distinct()
            ->pluck('zone_long_name', 'id');
        $regions = Region::orderBy('region_name')
            ->distinct('region_name')
            ->pluck('region_name', 'id');
        return view('admin.territory', compact('zones', 'regions'));
    }

    public function storeTerritory(Request $request)
    {
        $request->validate([
            'zone_id' => 'required|exists:zones,id',
            'region_id' => 'required|exists:regions,id',
            'territory_name' => 'required|string',
        ]);
        $regions = Region::find($request->input('zone_id'));
        $territory = new Territory([
            'territory_name' => $request->input('territory_name'),
            'zone_id' => $regions->zone_id,
            'region_id' => $regions->id,
            'zone_long_name' => $regions->zone_long_name,
            'region_name' => $regions->region_name,
        ]);
        $territory->save();
        return redirect()
            ->route('admin.territory')
            ->with('success', 'Territory added successfully!');
    }

    public function userForm()
    {
        // $zones = Zone::orderBy('zone_long_name')->distinct()->pluck('zone_long_name', 'id');
        $territory = Territory::orderBy('territory_name')
            ->distinct('territory_name')
            ->pluck('territory_name', 'id');
        return view('admin.user', compact('territory'));
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'territory_id' => 'required',
            'territory_name' => 'required|string',
            'username' => 'required|string|min:6|max:255',
            'password' => 'required|string|min:8|max:255',
            'mobile' => 'required|string|regex:/^[0-9]{10}$/',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'nic' => 'required|string|regex:/^[0-9]{9}[vVxX]$/',
            'gender' => 'required|in:Male,Female',
        ]);

        $territories = Territory::find($request->input('territory_id'));
        $user = new Distributor([
            'territory_name' => $territories->territory_name,
            'territory_id' => $territories->id,
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'nic' => $request->input('nic'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();
        return redirect()
            ->route('admin.user')
            ->with('success', 'User added successfully!');
    }

    public function productForm()
    {
        return view('admin.sku');
    }

    public function createProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sku_code' => 'required|string',
            'sku_name' => 'required|string',
            'mrp' => 'required|string',
            'distributor_price' => 'required|integer',
            'weight' => 'nullable|numeric|digits:10',
        ]);
        $product = new Product([
            'sku_code' => $request->input('sku_code'),
            'sku_name' => $request->input('sku_name'),
            'mrp' => $request->input('mrp'),
            'distributor_price' => $request->input('distributor_price'),
            'weight' => $request->input('weight'),
        ]);
        $product->save();
        return redirect()
            ->route('admin.product')
            ->with('success', 'SKU added successfully!');
    }
}
