@extends('layouts.app')
    @section('content')

    <div class="container">
        <h2 class="text-center">Contact Record</h2>
        <a href="javascript:void(0) " class="btn btn-primary float-end" id="addrecord">Add New Record</a>
        <table class="table table-bordered " id="data-table">
            <thead id="">
                <tr class="odd">
                    <th><input type="checkbox" name="maincheckbox" class="check" id="checkbox"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th width="250px">Action<button class="btn btn-danger btn-sm " id="deleteAllBtn">Delete All</button>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" id="updateAll" data-toggle="modal" data-target="#updatemodal">
                                Update All
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="updatebody">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">MASS UPDATE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form id="updatemass">
                                    <div class="modal-body">
                                        <input type="hidden" name="contact_id" id="contact_id"> {{-- heading --}}
                                        <div class="form-group">
                                            <label for="name">Name : </label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="massupdate" class="changes">Save changes</button>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                     </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>

        {{-- form modal --}}
        @include('contact.form')

        {{-- for show --}}

        @include('contact.show')
    </div>
    @endsection
