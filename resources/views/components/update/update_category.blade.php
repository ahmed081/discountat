<?php
    use Carbon\Carbon;
    
?>
<div class="modal fade" id="{{"updatecategory".$category->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Category</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/categories/update/{{$category->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            @if ($category->availability === 1)
                                <div class="form-label">the category is currently active</div>
                            @else
                                <div class="form-label">the category is currently desactive</div>
                            
                            @endif
                            <label class="custom-switch">
                                @if ($category->availability === 1)
                                    <input type="checkbox" checked name="availability" class="custom-switch-input">
                               
                                @else
                                    <input type="checkbox" name="availability" class="custom-switch-input">
                               
                                @endif
                                <span class="custom-switch-indicator"></span>
                                @if ($category->availability === 1)
                                    <span class="custom-switch-description">Desactivate</span>                                
                                @else
                                    <span class="custom-switch-description">active</span>                                
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-control-label">Name</label>
                            <input type="text" value="{{$category->name}}" name="name" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name Arabic</label>
                            <input type="text" value="{{$category->name_ar}}" name="name_ar" class="form-control" id="name">
                        </div>
                        
                        <div class="col-lg-12 col-sm-12">
                            <input type="file" class="dropify" name="image_url" data-default-file="{{$category->image_url}}" data-height="180"  />
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