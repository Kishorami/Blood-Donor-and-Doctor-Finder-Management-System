<div>
    {{-- <h1>home-videos</h1> --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Donor Import</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
                

                <form role="form" enctype="multipart/form-data" wire:submit.prevent="import()">
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
                                @if(Session::has('error_message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('error_message') }}</div>
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


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>File:</strong>
                                        <input type="file" name="file" wire:model="file">
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Import</button>
                            {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> --}}
                          </div>
                    </form>



              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <strong>Excel Import Format</strong>
                <table class="table table-bordered">
                  <thead>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                    <th>G</th>
                    <th>H</th>
                    <th>I</th>
                    <th>J</th>
                    <th>K</th>
                    <th>L</th>
                    <th>M</th>
                    <th>N</th>
                    <th>O</th>
                    <th>P</th>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Phone</td>
                      <td>Password</td>
                      <td>First Name</td>
                      <td>Last Name</td>
                      <td>Blood Group</td>
                      <td>Birth Date</td>
                      <td>Age</td>
                      <td>Email</td>
                      <td>Division (All Capital)</td>
                      <td>District (All Capital)</td>
                      <td>Upazila (All Capital)</td>
                      <td>Address</td>
                      <td>Gender</td>
                      <td>Post Code</td>
                      <td>Reference</td>
                      <td>Profession</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
