
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
                      Name
                    </th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    
                    <th>Payment Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                 @foreach($data as $product)
                    @foreach($product->order as $orders)
                    <tr>
                       <td>{{$product->username}}</td>
                       <td>{{$product->useremail}}</td>
                       <td>{{$product->usercity}}</td>
                       <td>{{$orders->product_name}}</td>
                       <td>{{$orders->product_price}}</td>
                       <td>{{$orders->paymnet_status}}</td>
                      
                       
                    </tr>
                    @endforeach
                    
                 @endforeach
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <!-- domain password -->
<!-- XHYLokhQ4D -->
            </div>
          </div>

        </div>
      </div>
    </section>

    @endsection