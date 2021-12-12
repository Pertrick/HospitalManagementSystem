@include('admin.navbar')

<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add a Doctor</h4>
                    <p class="card-description">kindly fill out form ! </p>
                    <form class="forms-sample" enctype="multipart/form-data"  action="{{ route('savedoctor') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectSpecialty">Specialty</label>
                        <select class="form-control" id="exampleSelectGender" name="specialty" >

                            <option>Select Item</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->specialty }}</option>
                            @endforeach    


                        </select>
                      </div>
                     <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender" name="gender">
                            <option>Select Item</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                            @endforeach    

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text"  name="phone" class="form-control" id="phone" placeholder="Phone">
                      </div>

                      <div class="form-group">
                        <label for="exampleRoomNo">Room No</label>
                        <input type="text"  name="room_no" class="form-control" id="room_no" placeholder="Room No">
                      </div>

                      <div class="form-group">
                        <label>File upload</label>
                        <div class="input-group col-xs-12">
                          <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image">
                        </div>
                      </div>
                      
                      <input type="submit" class="btn btn-primary mr-2" value="submit" >
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->


        @include('admin.footer')