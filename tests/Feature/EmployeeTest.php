<?php

namespace Tests\Feature;

use App\Http\Livewire\Pages\Employee\Create;
use App\Http\Livewire\Pages\Employee\Edit;
use App\Http\Livewire\Pages\Employee\Index;
use App\Http\Livewire\Pages\Employee\Table;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_employee_index_rendered()
    {
        $this->actingAs(User::factory()->create());

        Employee::factory()->count(10)->create();

        Livewire::test(Index::class)
            ->assertSeeLivewire(Table::class, ['employees' => Employee::all()]);


    }

    public function test_create_modal_can_be_showed()
    {
        $this->actingAs(User::factory()->create());

        $this->get('/employees')->assertStatus(200);

        Livewire::test(Index::class)
            ->assertSet('update', false)
            ->assertSee('Karyawan Baru')
            ->assertSeeLivewire('pages.employee.create')
            ->assertSeeHtml('#modalEmployee')
            ->assertSee('name')
            ->assertSee('ktp')
            ->assertSee('phone')
            ->assertSee('address')
            ->assertSee('gender')
            ->assertSee('maritial_status')
            ->assertSee('date_birthday')
            ->assertSee('place_of_birth')
            ->assertSee('Simpan');

        $this->withExceptionHandling();


    }

    public function test_create_a_new_employee()
    {
        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->create()  ;

        \Livewire::test(Create::class)
            ->set('name', $employee->name)
            ->set('ktp', $employee->ktp)
            ->set('phone', $employee->phone)
            ->set('gender', $employee->gender)
            ->set('maritial_status', $employee->marital_status)
            ->set('date_birthday', $employee->date_birthday)
            ->set('place_of_birth', $employee->place_of_birth)
            ->set('address', $employee->address)
            ->call('save');

        $this->assertDatabaseHas('employees', [
            'name' => $employee->name,
            'ktp' => $employee->ktp,
            'phone' => $employee->phone,
        ]);
    }

    public function test_fill_form_edit_employee()
    {
        $this->assertTrue(true);
    }

    public function test_edit_existing_employe()
    {
        $this->assertTrue(true);
    }



    public function test_can_update_existing_employee()
    {
        $this->assertTrue(true);
    }


}
