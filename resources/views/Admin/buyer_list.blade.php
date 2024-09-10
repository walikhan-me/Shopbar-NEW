
@extends('Admin.Admin_dashboard')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product List</h5>
                    <form method="GET" action="{{ route('buyer_list') }}">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <input type="text" name="email" class="form-control" placeholder="Filter by Email" value="{{ request('email') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                     Name
                    </th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>City</th>
                    
                  </tr>
                </thead>
                <tbody>
                 @foreach($buyers as $buyer)
                    <tr>
                       <td>{{$buyer->username}}</td>
                       <td>{{$buyer->useremail}}</td>
                       <td>{{$buyer->userrole}}</td>
                       <td>{{$buyer->usercity}}</td>
                       
                       
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