<div>
    <!-- Appointments -->
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">All Blood Receivers</h3>
                        </div>
                        <div class="col-6">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                        <div class="col-3">
                            <a href="{{ route('add_receiver_profile') }}" class="btn btn-success float-right text-white">Add New Receiver</a>
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
                            <th wire:click="sortBy('receiver_name')">R. Name</th>
                            <th wire:click="sortBy('receiver_phone')">R. Number</th>
                            <th wire:click="sortBy('receiver_hospital')">Hospital</th>
                            <th wire:click="sortBy('receiver_donation_date')">Donation Date</th>
                            <th wire:click="sortBy('blood_bag')">Blood Bag</th>
                            <th wire:click="sortBy('receiver_blood_group')">Blood Group</th>
                            <th wire:click="sortBy('donor_id')">Donor Id</th>
                            <th wire:click="sortBy('donor_name')">Donor Name</th>
                            <th wire:click="sortBy('donor_email')">Donor Email</th>
                            <th wire:click="sortBy('donor_phone')">Donor Phone</th>
                            <th style="width:7%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($allReceivers as $pro=>$rec_all)
                                <tr>
                                    <td>{{ $rec_all->id }}</td>
                                    <td>{{ $rec_all->receiver_name }}</td>
                                    <td>{{ $rec_all->receiver_phone }}</td>
                                    <td>{{ $rec_all->receiver_hospital }}</td>
                                    <td>{{ $rec_all->receiver_donation_date }}</td>
                                    <td>{{ $rec_all->blood_bag }}</td>
                                    <td>{{ $rec_all->receiver_blood_group }}</td>
                                    <td>{{ $rec_all->donor_id }}</td>
                                    <td>{{ $rec_all->donor_name }}</td>
                                    <td>{{ $rec_all->donor_email }}</td>
                                    <td>{{ $rec_all->donor_phone }}</td>
                                    <td>
                                        <a href="{{ route('edit_receiver_profile',['id'=>$rec_all->id]) }}" class="btn btn-warning waves-effect waves-light btn-sm">Edit</a>

                                        <a class="btn btn-danger waves-effect waves-light btn-sm" wire:click="deleteID('{{ $rec_all->id }}')" data-toggle="modal" data-target="#modalDeleteComponent">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $allReceivers->links() }}
                </div>
            </div>
        </div>
        <!-- Appointments -->


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
                                        <h4 class="text-center" style="color:red;">**If you delete Receiver Information, it will not update Donor Profile Info.**</h4>
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

        
        {{-- <style type="text/css">
            table {
              font-size: .80rem;
            }
        </style> --}}
</div>
