<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Livewire\WithPagination;

class CarSearch extends Component
{
    use WithPagination;

    public $all_cars;
    public $car_name;
    public $capacity;
    public $brand;

    protected $queryString = [
        'car_name' => ['except' => ''],
        'capacity' => ['except' => ''],
        'brand' => ['except' => ''],
    ];

    public function updating($name, $value)
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Car::query();

        if ($this->car_name) {
            $query->where('car_name', 'like', '%' . $this->car_name . '%');
        }

        if ($this->capacity) {
            $query->where('capacity', 'like', '%' . $this->capacity . '%');
        }

        if ($this->brand) {
            $query->where('brand', $this->brand);
        }

        $cars = $query->paginate(3);

        return view('livewire.car-search', [
            'cars' => $cars,
        ]);
    }

    public function mount(){
        $this->all_cars = Car::all();
    }

    public function delete($id){
        try{
            Car::where('id', $id)->delete();
            return redirect('/cars/list');
        }catch(\Exception $th){
            dd($th);
        }
    }

    public function search(){
        $this->resetPage();
        $this->updateQueryString();
    }

    public function updateQueryString(){
        $this->resetPage();
    }

}

