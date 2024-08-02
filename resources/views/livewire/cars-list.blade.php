<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>Cars</h2>
                </div>
                <div class="col">
                    <a href="/add/new" wire:navigate  class="btn btn-success btn-sm float-end">Add New Car</a>
                </div>
            </div>

            <div class="row md-3 p-2">

             <form class="d-flex" wire:submit.prevent="search">
                <form class="d-flex" role="search">
                  <input wire:model="car_name" wire:model="brand" class="form-control me-2" type="search" placeholder="Search ..." aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" style="margin: around 30px;">Search</button>
                </form>
             </form>
             
         
            </div>


        </div>
        <div class="card-body">
           
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
            @foreach ($cars as $item )
              <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->car_name}}</td>
                <td>{{$item->brand}}</td>
                <td>{{$item->capacity}}</td>
                <td>{{$item->fuel_type}}</td>
                <td>
                  <a href="/edit/car/{{$item->id}}" wire:navigate  class="btn btn-primary">Edit</a>
                  <button wire:click="delete({{$item->id}})" wire:confirm="Only admin who can do this action!" class="btn btn-danger btn-sm">Delete</button>
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

        <!-- <div x-data="{ count: 0 }">
          <h2 x-text="count"></h2>
          <button x-on:click="count++">+</button>
        </div> -->
      
        {{--  {{ $cars->links() }} --}} 
      

        </div>
    </div>
</div>
