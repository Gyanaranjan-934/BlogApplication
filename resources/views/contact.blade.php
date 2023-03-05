@extends('layout')
@section('main')
      <div class="row tm-row tm-mb-120">
          <div class="col-12">
              <h2 class="tm-color-primary tm-post-title tm-mb-60">Contact Us</h2>
          </div>
          <div class="col-lg-7 tm-contact-left">
              <form method="POST" action="" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                  <div class="form-group row mb-4">
                      <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Name</label>
                      <div class="col-sm-9">
                          <input class="form-control mr-0 ml-auto" name="name" id="name" type="text" required>                            
                      </div>
                  </div>
                  <div class="form-group row mb-4">
                      <label for="email" class="col-sm-3 col-form-label text-right tm-color-primary">Email</label>
                      <div class="col-sm-9">
                          <input class="form-control mr-0 ml-auto" name="email" id="email" type="email" required>
                      </div>
                  </div>
                  <div class="form-group row mb-4">
                      <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Subject</label>
                      <div class="col-sm-9">
                          <input class="form-control mr-0 ml-auto" name="subject" id="subject" type="text" required>
                      </div>
                  </div>
                  <div class="form-group row mb-5">
                      <label for="message" class="col-sm-3 col-form-label text-right tm-color-primary">Message</label>
                      <div class="col-sm-9">
                          <textarea class="form-control mr-0 ml-auto" name="message" id="message" rows="8" required></textarea>                                
                      </div>
                  </div>
                  <div class="form-group row text-right">
                      <div class="col-12">
                          <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                      </div>                            
                  </div>                                
              </form>
          </div>
          <div class="col-lg-5 tm-contact-right">
              <address class="mb-4 tm-color-gray">
                  Mega Hostel 1 for Boys, National Institute of Technology Calicut,
                  Kozhikode, Kerala,673601
              </address>
              <span class="d-block">
                  Tel:
                  <a href="tel:060-070-0980" class="tm-color-gray">+91-8114694934</a>
              </span>
              <span class="mb-4 d-block">
                  Email:
                  <a href="mailto:info@company.com" class="tm-color-gray">freetalks@gmail.com</a>
              </span>
              <p class="mb-5 tm-line-height-short">
                  The company is founded in 2022 by 4 students from the National Institute of Technology Calicut
                  They developed the application for the project purpose . This project will be developed to a commercial application for the company later.
              </p>
              <ul class="tm-social-links">
                  <li class="mb-2">
                      <a href="https://facebook.com" class="d-flex align-items-center justify-content-center">
                          <i class="fab fa-facebook"></i>
                      </a>
                  </li>
                  <li class="mb-2">
                      <a href="https://twitter.com" class="d-flex align-items-center justify-content-center">
                          <i class="fab fa-twitter"></i>
                      </a>
                  </li>
                  <li class="mb-2">
                      <a href="https://youtube.com" class="d-flex align-items-center justify-content-center">
                          <i class="fab fa-youtube"></i>
                      </a>
                  </li>
                  <li class="mb-2">
                      <a href="https://instagram.com" class="d-flex align-items-center justify-content-center mr-0">
                          <i class="fab fa-instagram"></i>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
@endsection