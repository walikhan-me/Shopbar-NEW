
@extends('Admin.Admin_dashboard')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product List</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Product</b>Name
                    </th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Colour</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Brand</th>
                    <th>Catagory</th>
                    <th>Material</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($products as $product)
                    <tr>
                       <td>{{$product->name}}</td>
                       <td>{{$product->description}}</td>
                       <td>{{$product->size}}</td>
                       <td>{{$product->color}}</td>
                       <td>{{$product->price}}</td>
                       <td>{{$product->quantity}}</td>
                       <td>{{$product->brand}}</td>
                       <td>{{$product->category}}</td>
                       <td>{{$product->material}}</td>
                       <td><img src="{{ asset('images/'.$product->image_path) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;"></td>
                       
                    </tr>
                 @endforeach
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    @endsection