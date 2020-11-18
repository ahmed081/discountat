<div class="modal fade" id="{{"resertpassword".$user->id}}" tabindex="-1" role="dialog"  aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Reset Password</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/users/resetpassword/{{$user->id}}" method="POST">
                @csrf
                <div class="modal-body">
                    
                        <div>
                            <p>
                                Are you sure you want reset the password <br/>
                                By doing the reset password action, all sessions correspend to that <a href="/users/{{$user->id}}">user</a> will be destroyed!!. <br>
                                sending the new password to the current user is part of the reset password action proccess
                            </p>
                        </div>
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: white; border-radius: 17px; width: 80px; height: 40px; color:#ecb403;border: 1px solid ;#ecb403" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="submit" style="background: #ecb403; border-radius: 17px; width: 180px; height: 40px; color: white;"  class="btn">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>