<div class="page-section" id="appointment">
    <div class="container " >
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{ route('appointment') }}" method="post">
         @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="full_name" value="{{ old('full_name') }}" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address.." name="email" value="{{ old('email') }}" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" name="date" value="{{ old('date') }}"required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="specialist" id="doctor" class="custom-select"  value="{{ old('specialist') }}" required>
            
                            <option>Choose a Doctor</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->name }}">{{ $doctor->name }} - {{ $doctor->specialty->specialty }}</option>
                            @endforeach    

                        </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number.." name="phone" value="{{ old('phone') }}" required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Make your complains.." required>{{ old('message') }}"</textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->