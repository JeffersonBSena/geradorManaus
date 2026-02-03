<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\DocumentItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class DocumentGenerator extends Component
{
    public $type = 'orcamento';
    public $number;
    public $date;
    public $customer_name;
    public $customer_identifier;
    public $object;
    public $items = [];
    public $discount = 0;
    public $subtotal = 0;
    public $total = 0;

    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->number = 'DOC-' . date('Ymd') . '-' . rand(100, 999);
        $this->addItem();
    }

    public function addItem()
    {
        $this->items[] = [
            'description' => '',
            'quantity' => 1,
            'unit_value' => 0,
            'total_value' => 0,
        ];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        $this->calculateTotals();
    }

    public function updatedItems($value, $key)
    {
        // $key looks like "0.quantity"
        $parts = explode('.', $key);
        if (count($parts) === 2 && in_array($parts[1], ['quantity', 'unit_value'])) {
            $index = $parts[0];
            $this->items[$index]['total_value'] = $this->items[$index]['quantity'] * $this->items[$index]['unit_value'];
        }
        $this->calculateTotals();
    }

    public function updatedDiscount()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->subtotal = array_sum(array_column($this->items, 'total_value'));
        $this->total = $this->subtotal - $this->discount;
    }

    public function save()
    {
        $this->validate([
            'customer_name' => 'required',
            'type' => 'required',
            'items.*.description' => 'required',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_value' => 'required|numeric',
        ]);

        $document = Document::create([
            'user_id' => Auth::id(),
            'type' => $this->type,
            'number' => $this->number,
            'date' => $this->date,
            'customer_name' => $this->customer_name,
            'customer_identifier' => $this->customer_identifier,
            'object' => $this->object,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'total' => $this->total,
        ]);

        foreach ($this->items as $item) {
            $document->items()->create($item);
        }

        session()->flash('success', 'Documento gerado com sucesso!');
        return redirect()->route('documents.list');
    }

    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.document-generator');
    }
}
