<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Doctors</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>

                        <div class="col-3">
                            <a class="btn btn-success float-right text-white" data-toggle="modal" data-target="#modalAddDoctor">Add New Doctor</a>
                        </div>
                    </div>             
                </div>
                <br>
                <div class="col-12">

                    <div class="row">

                    <label for="paginate" style="margin-top: auto;margin-left: auto;">Show</label>
                    <div class="col-sm-2">
                    <select id="paginate" name="paginate" class="form-control input-sm" wire:model="paginate">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    </div>  
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search">
                    </div>
                    </div>
                    <br>
                    <table id="datatable-makesales" class="table table-bordered table-striped nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th wire:click="sortBy('id')">S/N</th>
                            <th wire:click="sortBy('name')">Name</th>
                            <th wire:click="sortBy('designation')">Designation</th>
                            <th wire:click="sortBy('hospital')">Hospital</th>
                            <th wire:click="sortBy('speacilist')">Speacilist</th>
                            <th wire:click="sortBy('phone')">Phone</th>
                            <th wire:click="sortBy('schedule')">schedule</th>
                            <th style="width: 20%;" wire:click="sortBy('chamber_address')">Chamber</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allDoctors as $pro=>$doc_all)
                                <tr>
                                    <td>{{ $doc_all->id }}</td>
                                    <td>{{ $doc_all->name }}</td>
                                    <td>{{ $doc_all->designation }}</td>
                                    <td>{{ $doc_all->hospital }}</td>
                                    <td>{{ $doc_all->specialist }}</td>
                                    <td>{{ $doc_all->phone }}</td>
                                    <td>{{ $doc_all->schedule }}</td>
                                    <td>{{ $doc_all->chamber_address }}</td>
                                    <td>
                                        <input type="hidden" id="{{ $doc_all->id }}doc_des" value="{{ $doc_all->doctor_detail }}">
                                        <a onclick="editFunction('{{ $doc_all->id }}')" class="btn btn-warning btn-sm text-white" wire:click="getDoctor('{{ $doc_all->id }}')" data-toggle="modal" data-target="#modalEditDoctor">Edit</a>
                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $doc_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allDoctors->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Doctor    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalAddDoctor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeDoctor()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Add Doctor</h4>
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
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="name" placeholder="Name" required wire:model="name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Designation:</strong>
                                        <input type="text" class="form-control" name="designation" placeholder="Designation" wire:model="designation">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Hospital:</strong>
                                        <input type="text" class="form-control" name="hospital" placeholder="Hospital" wire:model="hospital">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Specialist:</strong>
                                        <select name="specialist" class="form-control" wire:model="specialist" required>
                                            <option value="">Select Specialiest</option>
                                            @foreach($data['doctor_specialities'] as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Division:</strong>
                                        <select name="division" class="form-control" wire:model="division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>District:</strong>
                                        <select name="district" class="form-control" wire:model="district" required>
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Upazila:</strong>
                                        <select name="upazila" class="form-control" wire:model="upazila" required>
                                            <option value="">Select Upazila</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required wire:model="phone">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Gender:</strong>
                                        <select name="gender" class="form-control" wire:model="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="image">
                                        <br>
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                        
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Preasent Address:</strong>
                                        <input type="text" class="form-control" name="preasent_address" placeholder="Preasent Address" required wire:model="preasent_address">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Details:</strong>
                                        <textarea id="doctor_detail" class="form-control" name="doctor_detail" placeholder="Details" rows="4" required wire:model="doctor_detail"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Schedule:</strong>
                                        <input type="text" class="form-control" name="schedule" placeholder="Schedule" required wire:model="schedule">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Chamber Address:</strong>
                                        <input type="text" class="form-control" name="chamber_address" placeholder="Chamber Address" wire:model="chamber_address">
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
                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                          </div>
                    </form>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--==========================
          =  Modal window for Edit Doctor    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalEditDoctor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="updateDoctor()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Doctor</h4>
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
                                        <strong>Name:</strong>
                                        <input type="text" class="form-control" name="e_name" placeholder="Name" required wire:model="e_name">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Designation:</strong>
                                        <input type="text" class="form-control" name="e_designation" placeholder="Designation" wire:model="e_designation">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Hospital:</strong>
                                        <input type="text" class="form-control" name="e_hospital" placeholder="Hospital" wire:model="e_hospital">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Specialist:</strong>
                                        <select name="e_specialist" class="form-control" wire:model="e_specialist" required>
                                            <option value="">Select Specialiest</option>
                                            @foreach($data['doctor_specialities'] as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Division:</strong>
                                        <select name="e_division" class="form-control" wire:model="e_division" required>
                                            <option value="">Select Division</option>
                                            @foreach($data['divisions'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->division_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>District:</strong>
                                        <select name="e_district" class="form-control" wire:model="e_district" required>
                                            <option value="">Select District</option>
                                            @foreach($districts as $row)
                                                <option value="{{ $row->district_name }}">{{ $row->district_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Upazila:</strong>
                                        <select name="e_upazila" class="form-control" wire:model="e_upazila" required>
                                            <option value="">Select Upazila</option>
                                            @foreach($locations as $row)
                                                <option value="{{ $row->thana }}">{{ $row->thana }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Phone:</strong>
                                        <input type="text" class="form-control" name="e_phone" placeholder="Phone" required wire:model="e_phone">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Gender:</strong>
                                        <select name="e_gender" class="form-control" wire:model="e_gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Image:</strong>
                                        <input type="file" class="input-file input-md" wire:model="e_image">
                                        <br>
                                        @if($e_image)
                                            <img src="{{ $e_image->temporaryUrl() }}" width="120">
                                        @else
                                           <img src="{{ $old_image }}" width="120">
                                        @endif
                                        
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Preasent Address:</strong>
                                        <input type="text" class="form-control" name="e_preasent_address" placeholder="Preasent Address" wire:model="e_preasent_address">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Details:</strong>
                                        <textarea id="e_doctor_detail" class="form-control" name="e_doctor_detail" placeholder="Details" rows="4" required wire:model="e_doctor_detail"></textarea>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Schedule:</strong>
                                        <input type="text" class="form-control" name="e_schedule" placeholder="Schedule" required wire:model="e_schedule">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Chamber Address:</strong>
                                        <input type="text" class="form-control" name="e_chamber_address" placeholder="Chamber Address" wire:model="e_chamber_address">
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
        

        @push('scripts')
        <script>
          $(document).ready(function() {
            $('#doctor_detail').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('doctor_detail', contents);
                    }
                }
            });


          });

          function editFunction(id) {
              var des = document.getElementById(id+"doc_des").value;
                console.log(id);
                console.log(des);

                $('#e_doctor_detail').summernote({
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('e_doctor_detail', contents);
                        }
                    }
                }).summernote('code', des);
            }
        </script>
        @endpush
        <style type="text/css">
            table {
              font-size: .80rem;
            }
        </style>
</div>
