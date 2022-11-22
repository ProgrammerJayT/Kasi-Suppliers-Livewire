<?php

namespace App\Http\Livewire\User\Stock\Edit;

use App\Models\Items;
use Livewire\Component;
use App\Models\Categories;
use Livewire\WithFileUploads;

class Vendor extends Component
{
    use WithFileUploads;

    public $item, $categories, $itemPrice, $itemQuantity, $itemName, $itemDescription, $itemImage, $itemCategory;

    public function update()
    {
        $this->validate([
            'itemName' => 'required',
            'itemCategory' => 'required',
            'itemDescription' => 'required',
            'itemPrice' => 'required',
            'itemQuantity' => 'required',
            'itemImage' => 'required',
        ]);

        if (
            $this->item->name == $this->itemName &&
            $this->item->category_id == $this->itemCategory &&
            $this->item->description == $this->itemDescription &&
            $this->item->price == $this->itemPrice &&
            $this->item->image == $this->itemImage &&
            $this->item->quantity == $this->itemQuantity
        ) {
            return back()->with('update-warning', 'No changes were made');
        }

        if (!is_string($this->itemImage)) {

            $imageUrlExplode = explode('.', $this->itemImage->getFilename());
            $imageExplodeArrayCount = count($imageUrlExplode);
            $imageExtension = $imageUrlExplode[$imageExplodeArrayCount - 1];

            $image = $this->itemImage->storeAs('img/vendor-stock/' . session()->get('profile')->id, $this->item->id . '.' . $imageExtension);
        } else {
            $image = $this->itemImage;
        }

        $updateItem = Items::find($this->item->id)->update(
            [
                'image' => $image,
                'name' => $this->itemName,
                'description' => $this->itemDescription,
                'price' => $this->itemPrice,
                'quantity' => $this->itemQuantity,
                'category_id' => $this->itemCategory
            ]
        );

        if ($updateItem) {
            return redirect()->route('stock')->with('success', 'Item updated successfully');
        } else {
            return back()->with('update-fail', 'Failed to update item details');
        }
    }

    public function deleteItem($id)
    {
        $delete = Items::find(session()->get('editItem'))->delete();

        if ($delete) {
            return redirect()->route('stock')->with('success', 'Item deleted successfully');
        } else {
            return back()->with('fail', 'Failed to delete item');
        }
    }

    public function mount()
    {
        $this->item = Items::find(session()->get('editItem'));
        $this->categories = Categories::all();

        // Set default values

        $this->itemDescription = $this->item->description;
        $this->itemCategory = $this->item->category_id;
        $this->itemName = $this->item->name;
        $this->itemQuantity = $this->item->quantity;
        $this->itemPrice = $this->item->price;
        $this->itemImage = $this->item->image;

    }
    public function render()
    {
        return view('livewire.user.stock.edit.vendor');
    }
}