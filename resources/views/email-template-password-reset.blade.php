<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Welcome To LifeCycleBD</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif
                        <h4>This is your varification code to reset Password of LifeCycleBD</h4>
                        <br>
                    	<h1 style="font-family: 'Times New Roman', Times, serif;">{!! $content !!}</h1>
                </div>
            </div>
        </div>
    </div>
</div>