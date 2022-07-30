<x-guest-layout>
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Register <em>Form</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="our-classes">
        <div class="container mb-5" style="max-width:500px">
          <div class="contact-form">
                <br><br><br>
                <form id="contact" action="{{ route('user.store') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        @error('name')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        <input value="{{old('name')}}" style="padding: 25px 20px;" name="name" type="text" id="name" placeholder="Name">         
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        @error('email')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        <input value="{{old('email')}}" style="padding: 25px 20px;" name="email" type="email" id="email" placeholder="Email">
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        @error('password')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                      <fieldset>
                        <input style="padding: 25px 20px;" name="password" type="password" id="password" placeholder="Password">
                      </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <fieldset>
                        <input style="padding: 25px 20px;" name="password_confirmation" type="password" id="password_confirmation" placeholder="Confirm Password">
                      </fieldset>
                    </div>
                    <div class="col-lg-12 main-button" >
                      <fieldset>
                        <button style="float: right;" type="submit" id="form-submit" >Register</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
            </div> 
        </div>
    </section>

</x-guest-layout>