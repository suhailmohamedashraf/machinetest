@extends('master_layout')
@section('content')
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">

<table id="example" class="display" style="width:100%">
        <thead>
        <tr>

        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Designation</th>
        <th>Operations</th>

</tr>
        </thead>
        <tbody>
        @foreach($employee as $staff)
                  
                  <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>

                    
                    <td><img width="80px" height="70px" src="{{ (!empty($staff->photo)) ? asset($staff->photo):asset('uploads/employee_images/no_image.jpg') }}" alt=""></td>

                    <td>{{ $staff['designations']['designation'] }}</td>

                    <td> <a class="btn btn-success" href="{{ route('edit.employee',$staff->id) }}">Edit</a> 
                        <a href="{{ route('delete.employee',$staff->id) }}" class="btn btn-danger">Delete</a> </td>                  
                  </tr>

                  @endforeach
     
        </tbody>
        <tfoot>
        <tr>

        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Designation</th>
        <th>Operations</th>

  </tr>
        </tfoot>
    </table>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">

    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
           
                

                <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Employee Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Name">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control"  placeholder="Enter email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                   
                  </div>
                  <div class="form-group">
                    <label>Designation</label>
                    <select class="custom-select form-control-border" name="designation">
                    <option selected="" disabled="">Select Designation</option>

                    @foreach($designation as $role)

                    <option value="{{ $role->id }}">{{ $role->designation }}</option>

                    @endforeach

                  </select>

                  @error('designation')

                      <p class="text-danger">{{ $message }}</p>

                  @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Employee Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>

                    @error('photo')
                      <p class="text-danger">{{ $message }}</p>

                    @enderror
                  </div>
                     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Employee</button>
                </div>
              </form>
            </div>
</div>




  
           











@endsection