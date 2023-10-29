<div>
    {{-- <h1>home-videos</h1> --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Home Slider Settings</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                

                <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateSlider()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            {{-- <h4 class="modal-title">Change Status</h4> --}}
                            <div class="col-6">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                            </div>
                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                            
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


                                 

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Add New Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                            {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                          </div>
                    </form>



              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer">
                Footer
              </div> --}}
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Sliders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                

                <table class="table table-bordered">
                    <thead>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($sliders as $row)
                            <tr>
                                <td>
                                    @if(strpos($row->pic_path,"lifecyclebd.org"))
                                        <img src="{{ $row->pic_path }}" style="width: 500px;">
                                    @else
                                        <img src="{{ asset('') }}{{ $row->pic_path }}" style="width: 500px;">
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $row->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



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
          =  Modal window for Delete    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalDeleteComponent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Entry</h4>
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
                                        <h2 class="text-center" style="color:red;">Are you want to delete?</h2>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" wire:click.prevent="delete()" class="btn btn-success waves-effect waves-light">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



</div>