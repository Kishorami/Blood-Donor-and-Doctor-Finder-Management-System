<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Blood Requests</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
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
                    <table id="datatable-makesales" class="table table-bordered nowrap data-table-makesales" style="overflow-wrap: anywhere;" width="100%">
                        <thead style="text-align: center;">
                        <tr>
                            <th wire:click="sortBy('id')">S/N</th>
                            {{-- <th wire:click="sortBy('sender_email')">Sender</th> --}}
                            {{-- <th wire:click="sortBy('sender_type')">Type</th> --}}
                            <th wire:click="sortBy('patient_name')">Patinet/contact  Name</th>
                            <th wire:click="sortBy('request_blood_group')">Group</th>
                            <th wire:click="sortBy('number_blood_bag')">Bag</th>
                            <th style="width:10%" wire:click="sortBy('patient_hospital')">Hospital/Location</th>
                            <th wire:click="sortBy('patient_phone')">Contact No.</th>
                            <th wire:click="sortBy('disease')">Disease/Reason</th>
                            <th style="width:10%" wire:click="sortBy('opration_time')">Time Of Need</th>
                            <th style="width:10%" wire:click="sortBy('message')">Message</th>
                            <th wire:click="sortBy('status')">Status</th>
                            <th >Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allBloodRequests as $pro=>$req_all)
                                <tr>
                                    <td>{{ $req_all->id }}</td>
                                    {{-- <td>{{ $req_all->sender_email }}</td> --}}
                                    {{-- <td>{{ $req_all->sender_type }}</td> --}}
                                    <td>{{ $req_all->patient_name }}</td>
                                    <td>{{ $req_all->request_blood_group }}</td>
                                    <td>{{ $req_all->number_blood_bag }}</td>
                                    <td>{{ $req_all->patient_hospital }}</td>
                                    <td>{{ $req_all->patient_phone }}</td>
                                    <td>{{ $req_all->disease }}</td>
                                    {{-- <td>{{ $req_all->opration_time }}</td> --}}
                                    <td>
                                        <?php 
                                                $timestamp = strtotime($req_all->opration_time);
                                                echo date('l dS \o\f F Y', $timestamp); 

                                                echo'  '. date('h:i a',$timestamp);
                                               ?>
                                    </td>

                                    <td>{{ $req_all->message }}</td>
                                    <td>{{ $req_all->status }}</td>
                                    <td>
                                        <a class="btn btn-success waves-effect waves-light btn-sm" wire:click="changeStatus('{{ $req_all->id }}')" data-toggle="modal" data-target="#modalChangeStatus">Change</a>
                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $req_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allBloodRequests->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


        <!--==========================
          =  Modal window for Add Doctor    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalChangeStatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" enctype="multipart/form-data" wire:submit.prevent="storeChangeStatus()">
                        @csrf
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Change Status</h4>
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
                                        <strong>Status:</strong>
                                        <select class="form-control" name="department_id" placeholder="Select Department" required wire:model="status">
                                            <option value="pending" selected="selected">Pending</option>
                                            <option value="Done" selected="selected">Done</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Change</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

        <style type="text/css">
            table {
              font-size: .80rem;
            }
        </style>
</div>
