<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

        <link rel="icon" type="image/x-icon" href="{{asset ('assets/img/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset ('/profile_image/'.$data_profile->img) }}" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <span class="text-primary">{{$data_profile->name}}</span>
                    </h1>
                    <div class="subheading mb-5">
                       {{$data_profile->address}}·
                        <a href="">{{$data_profile->email}}</a>
                    </div>
                    <p class="lead mb-5">{{$data_profile->about}}</p>
                    <div class="social-icons">
                        <a class="social-icon" href="{{$social_links->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="{{$social_links->git}}"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="{{$social_links->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    @foreach ( $experience as $exp)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$exp->position}}</h3>
                            <div class="subheading mb-3">{{$exp->company_name}}</div>
                            <p>{!!$exp->about!!}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$exp->duration}}</span></div>
                    </div>
                </div>
                @endforeach
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    @foreach ($education as $edu )
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{$edu->university}}</h3>
                            <div class="subheading mb-3">{{$edu->degree}}</div>
                            <div>{{$edu->course}}</div>
                            <p>GPA : {{$edu->gpa}}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$edu->duration}}</span></div>
                    </div>
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="skills">
                {{--  <div class="resume-section-content">

                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">

                        <li class="list-inline-item">
                            <img src=""  />
                        </li>  --}}

                        <div class="container">
                            <h2 class="mb-5">Skills</h2>
                            <div class="row">
                                @foreach ( $skill as $skills )
                              <div class="col-md-1">

                                <img src="{{asset('skills/'.$skills->skill_name)}}" class="img-fluid">

                            </div>
                            @endforeach

                            </div>
                        </div>
                        {{--  <li class="list-inline-item"><i class="fab fa-html5"></i></li>  --}}
                        {{--  <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>  --}}
                    {{--  </ul>  --}}
                    {{--  <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Mobile-First, Responsive Design
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Browser Testing & Debugging
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Functional Teams
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Agile Development & Scrum
                        </li>
                    </ul>
                </div>  --}}
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p>{!!$interest->interest!!}</p>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        @foreach ( $awards as $award )
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            {{$award->aac_names}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section id="contact" class="contact">
                <div class="container">

                  <div class="section-title">
                    <h2>Contact</h2>
                  </div>

                  <div class="row" data-aos="fade-in">

                    <div class="col-lg-5 d-flex align-items-stretch">
                      <div class="info">
                        <div class="address">
                          <i class="bi bi-geo-alt"></i>
                          <h4>Location:</h4>
                          <p>{{$data_profile->address}}</p>
                        </div>

                        <div class="email">
                          <i class="bi bi-envelope"></i>
                          <h4>Email:</h4>
                          <p>{{$data_profile->email}}</p>
                        </div>

                        <div class="phone">
                          <i class="bi bi-phone"></i>
                          <h4>Call:</h4>
                          <p>+91 {{$data_profile->phone}}</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                      </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                      <form action="{{url('contact/send')}}" method="post" class="php-email-form">@csrf
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" >
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="name">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" >
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name">Subject</label>
                          <input type="text" class="form-control" name="subject" id="subject" >
                          @error('subject')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="name">Message</label>
                          <textarea class="form-control" name="message" rows="10" ></textarea>
                          @error('message')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                         <div class="my-3">
                          {{--  <div class="loading">Loading</div>
                          <div class="error-message"></div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>  --}}
                        </div>
                        <div class="text-center"><button style="background:#bd5d38;color:white;" type="submit">Send Message</button></div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
        {{--  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>  --}}
        {{--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>  --}}
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Core theme JS-->
        <script src="{{asset ('js/scripts.js') }}"></script>
    </body>
    <script>
        toastr.options.tiomeOut = 3000;
        @if(Session::has('success'))
            toastr.success('{{Session::get('success')}}')
        @endif

    </script>
</html>
