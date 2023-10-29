<div>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-sm-3">
                        <h3 class="card-title">Change Emergency Information</h3>
                    </div>
                    <div class="col-sm-8" style="margin: auto;">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                    <div class="col-sm-1">
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool float-right" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                    </div>

                </div>
              </div>
              <div class="card-body">

                <input type="hidden" id="1des" value="{{ $data->ambulance_d }}">
                <input type="hidden" id="2des" value="{{ $data->blood_bank_d }}">
                <input type="hidden" id="3des" value="{{ $data->social_d }}">
                <input type="hidden" id="4des" value="{{ $data->graveyard_d }}">
                <input type="hidden" id="5des" value="{{ $data->funeral_d }}">
                <input type="hidden" id="6des" value="{{ $data->therapy_d }}">



                
               <a onclick="editFunction(1)" class="btn btn-warning btn-sm text-white" wire:click="setOption(1)" data-toggle="modal" data-target="#modalEdit">Ambulance</a>

               <a onclick="editFunction(2)" class="btn btn-warning btn-sm text-white" wire:click="setOption(2)" data-toggle="modal" data-target="#modalEdit">Blood Bank</a>

               <a onclick="editFunction(3)" class="btn btn-warning btn-sm text-white" wire:click="setOption(3)" data-toggle="modal" data-target="#modalEdit">Social Organization</a>

               <a onclick="editFunction(4)" class="btn btn-warning btn-sm text-white" wire:click="setOption(4)" data-toggle="modal" data-target="#modalEdit">Graveyard</a>

               <a onclick="editFunction(5)" class="btn btn-warning btn-sm text-white" wire:click="setOption(5)" data-toggle="modal" data-target="#modalEdit">Funeral bath/Zanaja</a>

               <a onclick="editFunction(6)" class="btn btn-warning btn-sm text-white" wire:click="setOption(6)" data-toggle="modal" data-target="#modalEdit">Theraphy Center</a>


              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer">
                Footer
              </div> --}}
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>



     <!--==========================
          =  Modal window for Edit Content    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateInfo()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Content</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Contact Number:</strong>
                                        <textarea type="text" class="form-control" name="contact" placeholder="Name" required wire:model="contact"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  
                                  
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Description:</strong>
                                        <textarea id="description" class="form-control" name="description" placeholder="Description" rows="4" required wire:model="description"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  
                                      
                                  
                                  
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->







    @push('scripts')
        <script>
            $(document).ready(function() {
            $('#description').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });


          });


            function editFunction(id) {
              var des = document.getElementById(id+"des").value;
                console.log(id);
                console.log(des);

                $('#description').summernote({
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('description', contents);
                        }
                    }
                }).summernote('code', des);
            }


            // document.addEventListener("DOMContentLoaded", () => {
            //     Livewire.hook('element.updated', (el, component) => {
            //         var data = @this.description;
            //         console.log(data);

            //         $('#description').summernote({
            //             callbacks: {
            //                 onChange: function(contents, $editable) {
            //                     @this.set('description', contents);
            //                 }
            //             }
            //         }).summernote('code', data);

            //     })
            // });

        </script>
    @endpush
</div>
