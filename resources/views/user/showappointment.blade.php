<x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My appointment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../admin/assets/images/favicon.png" />
  </head>
  <body>
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
                            <td> {{$sn++}} </td>
                            <td> {{$appointment->specialist}} </td>
                            <td> {{$appointment->date}} </td>
                            <td> {{$appointment->message}} </td>
                             @if($appointment->status) <td>Approved</td>
                             @else
                             <td>In Progress</td>
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
              </div>
              
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          @include('user.partials.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../admin/assets/js/off-canvas.js"></script>
    <script src="../../admin/assets/js/hoverable-collapse.js"></script>
    <script src="../../admin/assets/js/misc.js"></script>
    <script src="../../admin/assets/js/settings.js"></script>
    <script src="../../admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
</x-app-layout>