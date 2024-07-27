<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class AddCar extends Component
{

    public $is_flash_showing = false;

    public $car_name='';
    public $brand='';
    public $capacity='';
    public $fuel_type='';

    public function saveCar(){
        $this->validate([
            'car_name'=> 'required',
            'brand'=> 'required',
            'capacity'=> 'required',
            'fuel_type'=> 'required',
        ]);

        try{
            $new_car = new Car;
            $new_car->car_name = $this->car_name;
            $new_car->brand = $this->brand;
            $new_car->capacity = $this->capacity;
            $new_car->fuel_type = $this->fuel_type;
            $new_car->save();

            // return $this->redirect('/cars/list',navigate:true);
            $this->is_flash_showing = true;

        }catch(\Exception $e){
           dd($e);
        }

        
      
    }
    public function render()
    {
        return view('livewire.add-car');
    }
}
