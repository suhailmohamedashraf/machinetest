@extends('master_layout')
@section('content')
<div class="row">


    <div class="col-lg-6 col-md-6 col-sm-12">

    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">

                <form method="post" action="{{ route('update.employee') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $empdetails->photo }}" name="old_photo">
                <input type="hidden" value="{{$empdetails->id}}" name="id">
               
                <div class="form-group">
                    <label >Employee Name</label>
                    <input type="text" name="name" value="{{ $empdetails->name }}" class="form-control"  placeholder="Enter Name">

                
                  </div>
                  
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" value="{{ $empdetails->email }}" name="email" class="form-control"  placeholder="Enter email">
                    
                   
                  </div>
                  <div class="form-group">
                    <label>Designation</label>
                    <select class="custom-select form-control-border" name="des_id">
                    <option selected="" disabled="">Select Designation</option>
                    @foreach($des as $role)
                    <option {{ $empdetails->designation_id ==  $role->id ? 'selected' : '' }}
                       value="{{ $role->id }}" >{{ $role->designation }} 
                      
                    </option>

                    @endforeach
                  </select>

                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Employee Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                      @error('photo')
                      <p class="text-danger">{{ $message }}</p>

                    @enderror
                     
                    </div>
                  </div>
             
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

</div>

@endsection