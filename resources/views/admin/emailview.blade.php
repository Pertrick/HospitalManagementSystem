<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/public">
</head>
<body>
    
</body>
</html>
@include('admin.navbar')


<div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>
              <div style="text-align: center">{{session()->get('message') }}</div>
          </div>
          @endif

              <div class="col-md-12 grid-margin stretch-card" style="display:block; margin: 30px auto;">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Send Email Message</h4>
                    <p class="card-description"> complete the form to send message </p>
                    <form class="forms-sample" method="post" action="{{route('admin.sendmail', ['id' => $appointment->id] ) }}">
                        @csrf

                        <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Greetings</label>
                        <div class="col-sm-9">
                          <input type="text" name="greeting"  value ="Good day " class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Body</label>
                        <div class="col-sm-9">
                            <textarea name="body" id="" class="form-control"  id="exampleInputTextarea" cols="30" rows="10" placeholder="Enter message.. "></textarea>
                          
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="exampleRoomNo" class="col-sm-3 col-form-label">Action Text</label>
                        <div class="col-sm-9">
                        <input type="text"  name="actiontext" value="check out this link" class="form-control" id="action_text" placeholder="Enter text to be seen on button..">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Action Url</label>
                        <div class="col-sm-9">
                          <input type="text" name="actionurl" value="http://wwww.github.com/pertrick"  class="form-control" id="exampleInputActionUrl" placeholder="Enter redirection url when button is clicked..">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">End Part</label>
                        <div class="col-sm-9">
                          <input type="text" name="endpart" value="Thank you for your usual patronage and co-operation."   class="form-control" id="exampleInputUsername2" placeholder="Enter the ending salutation..">
                        </div>
                      </div>
                     
                      
                      <input type="submit" class="btn btn-primary mr-2 col-lg-3" value="submit" style="float:right"; >
                      
                    </form>
                  </div>
                </div>
              </div>
                      
            </div>
             
            </div>
        </div>
     </div>
          </div>
       



@include('admin.footer')