<div class="container">
    

<br>
   <div class="row">
      @if($is_flash_showing == true)
       <span class="alert alert-success">Create Successfully</span>
      @endif
   </div>
<br>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>Cars</h2>
                </div>
                <div class="col">
                    <a href="/cars/list"  wire:navigate class="btn btn-primary btn-sm float-end">Cars List</a>
                </div>
            </div>
        </div>
        <div class="card-body">

              <form action="" wire:submit="saveCar">

              <div class="mb-3">
                   <label for="name" class="form-label">Car Name:</label>
                   <input type="text" wire:model="car_name" class="form-control" id="car_name" name="car_name" placeholder="Enter car name">
                   @error('car_name')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
              </div>
              <div class="mb-3">
                   <label for="brand" class="form-label">Car Brand:</label>
                   <input type="text" wire:model="brand" class="form-control" id="brand" name="brand" placeholder="Enter car brand">
                   @error('brand')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
              </div>
              <div class="mb-3">
                   <label for="capacity" class="form-label">Engine Capacity:</label>
                   <input type="number" wire:model="capacity" class="form-control" id="capacity" name="capacity" placeholder="Enter car Engine Capacity">
                   @error('capacity')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
              </div>
              <div class="mb-3">
                   <label for="fuel_type" class="form-label">Fuel Type:</label>
                  <select name="fuel_type" wire:model="fuel_type" id="fuel_type" class="form_select">
                     <option value="">Select Fuel Type</option>
                     <option value="Diesel">Diesel</option>
                     <option value="Petrol">Petrol</option>
                     <option value="Electricity">Electricity</option>
                  </select>
                  @error('fuel_type')
                       <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>

              <button type:submit class="btn btn-success">Save</button>

              </form>


            </div>

        </div>
    </div>

