<div class="modal fade" id="{{"updateuser".$user->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">User</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="full-name" class="form-control-label">Full Name</label>
                            <input type="text" value="{{$user->full_name}}" name="full_name" class="form-control" id="full-name">
                        </div>
                        <div class="form-group">
                            <label for="email"  class="form-control-label">Email</label>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control" id="email">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <input type="file" class="dropify" name="image" data-default-file="{{$user->image}}" data-height="180"  />
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: white; border-radius: 17px; width: 80px; height: 40px; color:#1FC0D8;border: 1px solid ;#1FC0D8" class="btn" data-dismiss="modal">Close</button>
                    <button type="submit" style="background: #1FC0D8; border-radius: 17px; width: 180px; height: 40px; color: white;"  class="btn">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>