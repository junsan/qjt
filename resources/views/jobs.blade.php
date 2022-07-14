@extends('layout')

@section('content')
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Jobs</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                    <form action="{{route('jobs')}}" method="GET">
                        <div class="main-button">
                            <input style="padding: 11px 20px; width: 500px;" name="search" type="text" id="name" placeholder="Enter job title, keyword or company">
                            <button type="submit">Search Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <div class="col-lg-4">
                    <form action="#">
                         <h5 style="margin-bottom: 15px">Employment</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Full time</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Part Time</span>
                              </label>
                         </div>

                         <br>

                         <h5 style="margin-bottom: 15px">Category</h5>

                         @foreach($categories as $category)
                            <div>
                                <label>
                                    <input type="checkbox">

                                    <span>{{$category->name}}</span>
                                </label>
                            </div>
                        @endforeach
                         

                         <br>

                         <h5 style="margin-bottom: 15px">Industry</h5>

                         @foreach($industries as $industry)
                            <div>
                                <label>
                                    <input type="checkbox">

                                    <span>{{$industry->name}}</span>
                                </label>
                            </div>
                        @endforeach

                         <br>
                        
                    </form>
                    
                    <br>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-md-6">
                                <div class="trainer-item">
                                    <div class="image-thumb">
                                        <img src="assets/images/product-1-720x480.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span></span>

                                        <h4>{{$job->title}}</h4>

                                        <p>{{$job->category->name}} &nbsp;/&nbsp; {{$job->industry->name}}</p>

                                        <ul class="social-icons">
                                            <li><a href="job-details.html">+ View More</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            

            <br>
                
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection