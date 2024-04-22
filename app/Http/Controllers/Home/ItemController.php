<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\Item;
use App\Models\User;
use App\Models\Source;
use App\Models\Category;
use App\Models\EndorseTo;
use App\Models\Inventory;
use App\Models\Endorsement;
use Illuminate\Support\Str;
use App\Models\ItemInstance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $sources = Source::all();
        $items = Item::with('source', 'itemInstances', 'inventory')
            ->withCount('itemInstances')
            ->get();
        $categories = Category::all();
        $users = User::all();
        return view('items.index', compact('sources', 'items', 'categories', 'users'));
    }

    public function store(Request $request)
    {
        if (!empty($request->category_name)) {
            $item = Item::create([
                'category_id' => $request->category_name,
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'item_specification' => $request->item_specification,
                'old_property_number' => $request->old_property_number,
                'new_property_number' => $request->new_property_number,
                'unit_measure' => $request->unit_measure,
                'source_id' => $request->source,
                'date_acquired' => $request->date_acquired,
            ]);
        } else {
            // Handle the case when category_name is empty
            // You may throw an exception, log an error, or handle it according to your application's logic
        }


        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('backend/item-images/'), $imageName);

            $item->item_image = 'backend/item-images/' . $imageName;
            $item->save();
        }

        // Quantity is the number of items to be added //

        for ($i = 1; $i <= $request->quantity; $i++) {
            $uuid = Str::uuid()->toString();
            $shortenedUuid = substr($uuid, 0, 13); // Extract the first 13 characters
            $itemInstance = ItemInstance::create([
                'item_id' => $item->id,
                'status' => 'Good Condition',
                'serial_number' => $shortenedUuid,
            ]);
        }
        return redirect()->back()->with('success', 'Item added successfully');
    }


    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update([
            'item_image' => public_path('public/logo/stihslogo.png'), // Default image path if no image is uploaded
            'category_id' => $request->category_name,
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_specification' => $request->item_specification,
            'old_property_number' => $request->old_property_number,
            'new_property_number' => $request->new_property_number,
            'unit_measure' => $request->unit_measure,
            'source_id' => $request->source,
            'date_acquired' => $request->date_acquired,
        ]);

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted successfully');
    }

    public function show($id)
    {
        $item = Item::find($id);
        $users = User::all();
        $itemInstances = ItemInstance::with('item')->where('item_id', $id)->get();
        return view('items.show', compact('item', 'itemInstances', 'users'));
    }
}
