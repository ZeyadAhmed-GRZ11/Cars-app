<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cars List</h3>
                    <div class="card-tools">
                        <input wire:model="car_name" wire:model="brand" type="search" placeholder="Search Car Name or Brand" aria-label="Search">
                        <input type="number" wire:model="capacity" type="search" placeholder="Search Engine capacity">
                         <select name="fuel_type" wire:model="fuel_type" id="fuel_type" class="form_select">
                              <option value="">No Selected</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Petrol">Petrol</option>
                              <option value="Electricity">Electricity</option>
                         </select>
                        <button class="btn btn-outline-success" type="submit">Search</button>
    
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Engine Capacity</th>
                                <th scope="col">Engine Fuel Type</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$car->car_name}}</td>
                                    <td>{{$car->brand}}</td>
                                    <td>{{$car->capacity}}</td>
                                    <td>{{$car->fuel_type}}</td>
                                    <td>
                                        <a href="/edit/car/{{$car->id}}" wire:navigate  class="btn btn-primary">Edit</a>
                                        <button wire:click="delete({{$car->id}})" wire:confirm="Only admin who can do this action!" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                    <td>
                                        <div class="spinner-grow" role="status" wire:loading>  {{--.target="delete({{$item->id}})"--}}
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cars->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
