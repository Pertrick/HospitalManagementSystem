

@include('user.partials.header')



    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert">x</button>
                <div style="text-align: center">{{session()->get('message') }}</div>
            </div>
          @endif

            <div class="page-header" style="margin:5px;">
              <h3 class="page-title"  style="padding:10px; font-weight:900;"> My Appointments</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('redirectohome') }} ">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Appointments</li>
                </ol>
              </nav>
            </div>
            
                <div class="card">
                  <div class="card-body">
                    <p class="card-description"> Find below your appointments
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th> S/N </th>
                            <th> Doctor name </th>
                            <th> Date </th>
                            <th> Message</th>
                            <th> Status</th>
                            <th> Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                          <tr>
                            <td> {{$sn++}}. </td>
                            <td> {{$appointment->specialist}} </td>
                            <td> {{$appointment->date}} </td>
                            <td> {{$appointment->message}} </td>

                            @if($appointment->status == 'In Progress')
                             <td>
                                <div style="background-color: yellow; text-align:center; font-weight:bold; padding:3px;">
                                  {{$appointment->status}}
                                </div>
                              </td>

                             @elseif($appointment->status == 'Cancelled')
                             <td>
                                <div style="background-color: red; text-align:center; font-weight:bold; padding:3px;">
                                   {{$appointment->status}}
                                  </div>
                              </td>

                              @else  
                              <td>
                                  <div style="background-color: green; text-align:center; font-weight:bold; padding:3px;">
                                    {{$appointment->status}}
                                  </div>
                              </td>

                              @endif

                             <td>
                             <a href="{{ route('cancelappointment', ['id' => $appointment->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure? ');">Cancel</a>
                             </td>
                      
                          </tr>

                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
              
         

@include('user.partials.footer')