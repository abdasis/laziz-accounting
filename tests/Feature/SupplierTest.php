<?php

namespace Tests\Feature;

use App\Http\Livewire\Pages\Suppliers\Create;
use App\Http\Livewire\Pages\Suppliers\Edit;
use App\Http\Livewire\Pages\Suppliers\Index;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_supplier_index_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/suppliers');

        $response->assertStatus(200);
    }


    public function test_supplier_show_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());

        $supplier = \App\Models\Supplier::factory()->create();

        $response = $this->get('/suppliers/show/'.$supplier->id);

        $response->assertStatus(200);
    }

    public function test_create_modal_can_be_show()
    {
        $this->actingAs($user = User::factory()->create());

        $this->get('suppliers')->assertSeeLivewire('pages.suppliers.create');
    }

    public function test_input_company_detail_step()
    {
        $this->actingAs($user = User::factory()->create());

        $response = Livewire::test(Create::class)
            ->set('company_name', 'Test Supplier')
            ->set('province', 'Test Province')
            ->set('city', 'Test City')
            ->set('districts', 'Test Districts')
            ->set('postal_code', 'Test Postal Code')
            ->set('address', 'Test Address')
            ->set('industry_type', 'Test Industry Type')
            ->set('status', 'active')
            ->set('step', '2')
            ->call('companyInfo');


        $response->assertSet('step',2);


    }

    public function test_input_contact_detail_stap()
    {

        $response = Livewire::actingAs(User::factory()->create())
            ->test(Create::class)
            ->set('contact_name', 'Test Contact Name')
            ->set('email', 'Test Contact Email')
            ->set('phone', 'Test Contact Phone')
            ->set('company_name', Supplier::factory()->create()->company_name)
            ->set('province', 'Test Province')
            ->set('city', 'Test City')
            ->set('districts', 'Test Districts')
            ->set('postal_code', 'Test Postal Code')
            ->set('address', 'Test Address')
            ->set('industry_type', 'Test Industry Type')
            ->call('contactInfo');

        $this->assertTrue(Supplier::whereCompanyName($response->get('company_name'))->exists());

    }

    public function test_edit_modal_rendered()
    {
        $this->actingAs(User::factory()->create());
        $supplier = Supplier::factory()->create();
        Livewire::test(Index::class, ['supplier' => $supplier])
            ->set('update', true )
            ->assertSet('update', true)
            ->assertSeeLivewire('pages.suppliers.edit');

    }

    public function test_fill_form_edit_company_info()
    {
        $this->actingAs($user = User::factory()->create());

        Supplier::factory()->create();

        $supplier = Supplier::first();

        $response = Livewire::test(Edit::class, ['supplier' => $supplier])
            ->assertSet('company_name', $supplier->company_name);

    }


}
