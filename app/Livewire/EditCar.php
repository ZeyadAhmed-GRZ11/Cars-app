<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;


class EditCar extends Component
{

    public $is_flash_showing = false;

    public $car_id;
    public Car $car_data;
    public $car_name='';
    public $brand='';
    public $capacity='';
    public $fuel_type='';

    public function mount($id){
       
       $this->car_id = $id;

       $this->car_data = Car::where('id',$id)->first();
       $this->car_name = $this->car_data->car_name;
       $this->brand = $this->car_data->brand;
       $this->capacity = $this->car_data->capacity;
       $this->fuel_type = $this->car_data->fuel_type;
    }

    public function update(){
        $this->validate([
            'car_name'=> 'required',
            'brand'=> 'required',
            'capacity'=> 'required',
            'fuel_type'=> 'required',
        ]);

        try{
           Car::where('id',$this->car_id)->update([   

            //   dd($this->car_id);

              'car_name' => $this->car_name,
              'brand' => $this->brand,
              'capacity' => $this->capacity,
              'fuel_type' => $this->fuel_type,
           ]);
            $this->is_flash_showing = true;
            // $this->redirect('/cars/list',navigate:true);

           }catch(\Exception $th){
            dd($th);
           }
      
    }

    public function render()
    {
        return view('livewire.edit-car');
    }
}
