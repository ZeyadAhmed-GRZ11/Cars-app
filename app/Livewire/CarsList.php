<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class CarsList extends Component
{

    public $all_cars;
    // public $car_id;
    
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

    public function render()
    {
        return view('livewire.cars-list',[
            'cars'=> $this->all_cars
        ]);
    }
}
