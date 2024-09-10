@extends('Admin.Admin_dashboard')

@section('content')
<section class="section dashboard">
      <div class="row">
      <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add product</h5>

              <!-- General Form Elements -->
              <form action="/submit_product" method="POST" enctype="multipart/form-data">
              
                 @csrf
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Description</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_description">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Size</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_size">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Colour</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_colour">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_price">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_quantity">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Brand</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_brand">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Catogory</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="product_catagory">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Material</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_material">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Image Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="product_image">
                  </div>
                </div>
              

                
              

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

</div>
       

      </div>
</section>
@endsection