<?php

namespace Tests\Feature;

use App\Models\Budget;
use App\Models\Customer;
use App\Models\FinancialTransaction;
use App\Models\ServiceOrder;
use App\Models\SLA;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagementSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_customer()
    {
        $customer = Customer::create([
            'name' => 'Test Customer',
            'type' => 'company',
            'document_number' => '12345678000199',
            'status' => 'active',
        ]);

        $this->assertDatabaseHas('customers', ['email' => null, 'name' => 'Test Customer']);
    }

    public function test_can_create_financial_transaction_linked_to_customer()
    {
        $customer = Customer::create(['name' => 'Client A']);
        
        $transaction = FinancialTransaction::create([
            'customer_id' => $customer->id,
            'type' => 'income',
            'amount' => 100.00,
            'due_date' => now(),
            'description' => 'Sale',
            'status' => 'pending',
        ]);

        $this->assertEquals($customer->id, $transaction->customer->id);
    }

    public function test_budget_has_items_and_totals()
    {
        $customer = Customer::create(['name' => 'Client B']);
        $budget = Budget::create([
            'customer_id' => $customer->id,
            'valid_until' => now()->addDays(10),
        ]);

        $budget->items()->create([
            'description' => 'Item 1',
            'quantity' => 2,
            'unit_price' => 50.00,
            'total_price' => 100.00,
        ]);

        $this->assertCount(1, $budget->items);
        $this->assertEquals(100.00, $budget->items->first()->total_price);
    }

    public function test_service_order_calculates_due_at_based_on_sla()
    {
        $customer = Customer::create(['name' => 'Client C']);
        $sla = SLA::create([
            'name' => 'Gold Support',
            'resolution_time_hours' => 4,
        ]);

        $now = now();
        
        $os = ServiceOrder::create([
            'customer_id' => $customer->id,
            'sla_id' => $sla->id,
            'description' => 'Help needed',
            'opened_at' => $now,
            'status' => 'open',
        ]);

        // We expect due_at to be roughly 4 hours after opened_at
        // Using strict comparison might fail due to microseconds, so we check difference in minutes
        $this->assertEquals(
            $now->copy()->addHours(4)->startOfMinute(), 
            $os->due_at->startOfMinute()
        );
    }
}
