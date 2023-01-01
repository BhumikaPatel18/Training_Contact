<div class="modal fade" id="modal" area-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modaltitle" id="modalheading"></h4>
            </div>

            <div class="modal-body" id="modalbody">

                <form id="contactform">
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

                    <div class="form-group">
                        <label for="select">Select Account</label>
                         @php
                          $accounts = DB::table('accounts')->select('name','id')->get();
                        @endphp
                        {{-- @dd($contacts) --}}
                        <select name="accountselect" class="form-control",id="accountselect", value="">
                            @foreach ($accounts  as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" class="form-control" name="inputid" id="inputid" placeholder="">

                    <button type="submit" class="btn btn-primary" id="submitbtn">SAVE</button>
                    <button type="button" class="btn btn-danger float-right"
                        data-dismiss="modal">CLOSE</button>
                </form>

            </div>

        </div>
    </div>

</div>
</div>
