@include('admin.navbar')
        <!-- partial -->
       
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert">x</button>
                <div style="text-align: center">{{session()->get('message') }}</div>
            </div>
          @endif

            <div class="page-header">
              <h3 class="page-title">Our Doctors</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('redirectohome') }} ">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Our Doctors</li>
                </ol>
              </nav>
            </div>
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-description"> Find below all our Doctors 
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th> S/N </th>
                            
                            <th> Name </th>
                            <th> Email </th>
                            <th> Specialty </th>
                            <th> Phone</th>
                            <th> Room No </th>
                            <th> Image</th>
                            <th style="text-align:center;"> Action </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                          <tr>
                            <td> {{$sn++}} </td>
                            <td> {{$doctor->name}} </td>
                            <td> {{$doctor->email}} </td>
                            <td> {{$doctor->specialty->specialty}} </td>
                            <td> {{$doctor->phone}} </td>
                            <td> {{$doctor->room_no}} </td>
                            <td>
                               <img src="{{URL::to('/')}}/storage/doctors/images/{{$doctor->image}}" alt="{{$doctor->name}}">

                            </td>

                            <td colspan="2" >
                             <a href="{{ route('admin.editdoctor', ['id' => $doctor->id]) }}" class="btn btn-success"  style="margin: 5px 25px;">Edit</a>
                             
                             <a href="{{ route('admin.deletedoctor', ['id' => $doctor->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure? ');">Delete</a>
                             </td>
                            
          

                             
                      
                          </tr>

                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
     
                  
@include('admin.footer')