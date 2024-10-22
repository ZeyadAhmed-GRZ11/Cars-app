<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;


class CarsList extends Component
{

    public $all_cars;
    public $car_name;
    public $capacity;
    public $brand;
    public $fuel_type;


    // public $car_id;

    protected $queryString = [
        'car_name' => ['except' => ''],
        'capacity' => ['except' => ''],
        'brand' => ['except' => ''],
        'fuel_type' => ['except' => ''],
    ];

    public function updating($name, $value)
    {
        $this->resetPage();
    }

    public function search(){
        $this->resetPage();
        $this->updateQueryString();
    }

    public function updateQueryString(){
        $this->resetPage();
    }

    public function resetPage(){
        $this->currentPage = 1;
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
        if ($this->fuel_type) {
            $query->where('fuel_type', $this->fuel_type);
        }

        $cars = $query->paginate(10);
   
        return view('livewire.cars-list',[
           'cars' => $cars,
        ]);

    }
    
    public function mount(){
        $this->all_cars = Car::all();
    }

    public function delete($id){
        try{
            Car::where('id', $id)->delete();
            return $this->redirect('/cars/list',navigate:true);
        }catch(\Exception $th){
            dd($th);
         }
    }

   
}
