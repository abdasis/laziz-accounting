<?php

namespace Tests\Feature;

use App\Http\Livewire\Pages\Employee\Create;
use App\Http\Livewire\Pages\Employee\Index;
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

        $response = $this->get('/employees');

        $response->assertStatus(200)
            ->assertSeeLivewire('pages.employee.table');

        $this->withExceptionHandling();


    }

    public function test_modal_employee_can_be_rendered()
    {
        $this->actingAs(User::factory()->create());

        $this->withExceptionHandling();


        Livewire::test(Index::class)
            ->assertSet('update', false)
            ->assertSee('Karyawan Baru')
            ->assertSeeLivewire('pages.employee.create')
            ->assertSeeHtml('#modalEmployee');
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
            ->set('marital_status', $employee->marital_status)
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
}
