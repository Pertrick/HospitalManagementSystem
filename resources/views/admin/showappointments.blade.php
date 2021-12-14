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
              <h3 class="page-title"> My Appointments</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('redirectohome') }} ">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Appointments</li>
                </ol>
              </nav>
            </div>
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-description"> Find below all appointments
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th> S/N </th>
                            <th> Account Name </th>
                            <th> Patient Name </th>
                            <th> Email </th>
                            <th> Doctor name </th>
                            <th> Date </th>
                            <th> Message</th>
                            <th> Status</th>
                            <th> Approve</th>
                            <th> Cancel</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                          <tr>
                            <td> {{$sn++}} </td>
                            <td> {{$appointment->user->name}} </td>
                            <td> {{$appointment->full_name}} </td>
                            <td> {{$appointment->email}} </td>
                            <td> {{$appointment->specialist}} </td>
                            <td> {{$appointment->date}} </td>
                            <td> {{$appointment->message}} </td>
                            <td>{{$appointment->status}}</td>
                             

                             <td>
                             <a href="{{ route('admin.approveappointment', ['id' => $appointment->id]) }}" class="btn btn-success" onClick="return confirm('Are you sure? ');">Approve</a>
                             </td>

                             <td>
                             <a href="{{ route('admin.cancelappointment', ['id' => $appointment->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure? ');">Cancel</a>
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