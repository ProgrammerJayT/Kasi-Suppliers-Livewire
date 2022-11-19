<?php

namespace App\Http\Livewire\User\Vendor;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use Livewire\WithFileUploads;

class Stock extends Component
{
    use WithFileUploads;

    public $items, $categories, $itemCategory, $itemDescription, $itemName, $itemQuantity, $itemPrice, $itemImage;

    public $newName, $newCategory, $newImage, $newDescription, $newPrice, $newQuantity;

    protected $rules = [
        'itemCategory' => 'required',
        'itemDescription' => 'required',
        'itemName' => 'required',
        'itemQuantity' => 'required',
        'itemPrice' => 'required',
        'itemImage' => 'required|image|max:1024000',
    ];

    public function addItem()
    {
        $this->validate();

        $imageUrlExplode = explode('.', $this->itemImage->getFilename());
        $imageExplodeArrayCount = count($imageUrlExplode);
        $imageExtension = $imageUrlExplode[$imageExplodeArrayCount - 1];

        try {

            $createItem = Items::create(
                [
                    'category_id' => $this->itemCategory,
                    'vendor_id' => session()->get('profile')->id,
                    'name' => $this->itemName,
                    'quantity' => $this->itemQuantity,
                    'description' => $this->itemDescription,
                    'image' => 'img/vendor-stock/default',
                    'price' => $this->itemPrice,
                ]
            );

            if ($createItem) {
                Items::find($createItem->id)->update(
                    [
                        'image' => $this->itemImage->storeAs('img/vendor-stock/' . session()->get('profile')->id, $createItem->id . '.' . $imageExtension),
                    ]
                );
            }

            $this->itemCategory = '';
            $this->itemName = '';
            $this->itemQuantity = '';
            $this->itemDescription = '';
            $this->itemPrice = '';

            return back()->with('success', 'Item successfully added');

        } catch (\Throwable $th) {
            dd('failed. ' . $th->getMessage());
            return back()->with('fail', $th->getMessage());
        }
    }

    public function edit($id)
    {
        session()->put('editItem', $id);

        if (session()->has('editItem')) {
            return redirect()->route('stock.edit');
        }
    }

    public function delete($id)
    {
        try {
            Items::find($id)->delete();
            return back()->with('success', 'Item successfully deleted');
        } catch (\Throwable $th) {
            return back()->with('fail', 'Failed to delete item. ' . $th->getMessage());
        }
    }

    public function render()
    {
        $this->categories = Categories::all();
        $this->items = Items::where('vendor_id', session()->get('profile')->id)->get();

        return view('livewire.user.vendor.stock');
    }
}