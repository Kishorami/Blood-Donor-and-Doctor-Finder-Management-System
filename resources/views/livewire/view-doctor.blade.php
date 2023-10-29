<div>
    <!--==================== Our Doctors ====================-->
    <section class="space">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub-title_center">
                        {{-- <span>---- Our Team ----</span> --}}
                        <h2>Our Dedicated Doctors</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($requested_doctors as $row)
                <div class="col-md-3">
                    <div class="docrtors-box1">
                        <img src="images/doctors-img1.jpg" class="img-fluid dotor-box1-img" alt="#">
                        <h4>Dr. Mary Joe</h4>
                        <p>SURGEON</p>
                        
                        <div class="bg-shade"><img src="images/bg-shade.png" class="img-fluid" alt="#"></div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
</div>
