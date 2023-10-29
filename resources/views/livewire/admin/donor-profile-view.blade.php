<div>
    


<div class="wrapper">
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donor Profile</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6" style="margin:auto;">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if($donorInfo->pic_path)
                  <img class="profile-user-img img-fluid img-circle"
                       {{-- src="{{ $donorInfo->pic_path }}" --}}
                       src="{{ asset($donorInfo->pic_path) }}"
                       alt="User profile picture">
                    @else
                    <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('images/logo/profilepic.jpg') }}"
                       alt="User profile picture">
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $donorInfo->fname }}  {{ $donorInfo->lname }}</h3>

                {{-- <p class="text-muted text-center">{{ $donorInfo->occupation }}</p> --}}

                <ul class="list-group list-group-unbordered mb-3">

                  <li class="list-group-item">
                    <b>Blood Group:</b> <a class="float-right">{{ $donorInfo->blood_group }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>NO. of Blood Donation:</b> <a class="float-right">{{ $donorInfo->donations_number }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Last Donate:</b> <a class="float-right">{{ $donorInfo->last_donation }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Email:</b> <a class="float-right">{{ $donorInfo->email }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">{{ $donorInfo->phone }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Address:</b> <a class="float-right">{{ $donorInfo->address }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Profession:</b> <a class="float-right">{{ $donorInfo->occupation }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Gender:</b> <a class="float-right">{{ $donorInfo->gender }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Date of Birth:</b> <a class="float-right">{{ $donorInfo->birth_date }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Age:</b> <a class="float-right">{{ $donorInfo->age }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Division:</b> <a class="float-right">{{ $donorInfo->division }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>District:</b> <a class="float-right">{{ $donorInfo->district }}</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Thana/upazila:</b> <a class="float-right">{{ $donorInfo->upazila }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Password:</b> <a class="float-right">{{ $donorInfo->password }}</a>
                  </li>
                  {{-- <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li> --}}
                  


                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

</div>
