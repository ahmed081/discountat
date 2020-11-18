<?php
    use Carbon\Carbon;
    
?>
<div class="modal fade" id="{{"updateads".$ads->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Ads</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/ads/update/{{$ads->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            @if ($ads->availability === 1)
                                <div class="form-label">the ads is currently active</div>
                            @else
                                <div class="form-label">the ads is currently desactive</div>
                            
                            @endif
                            <label class="custom-switch">
                                @if ($ads->availability === 1)
                                    <input type="checkbox" checked name="availability" class="custom-switch-input">
                               
                                @else
                                    <input type="checkbox" name="availability" class="custom-switch-input">
                               
                                @endif
                                <span class="custom-switch-indicator"></span>
                                @if ($ads->availability === 1)
                                    <span class="custom-switch-description">Desactivate</span>                                
                                @else
                                    <span class="custom-switch-description">active</span>                                
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-control-label">Ads</label>
                            <input type="text" value="{{$ads->title}}" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group ">
                            <label for="brands"  class="form-control-label">Brands</label>
                            <select style="border-radius: 15px;" class="form-control select2 custom-select" data-placeholder="Choose one" name='brand_id'>
                                <option label="Brands">
                                </option>
                                @foreach ($brands as $brand)
                                        @if ($ads->brand_id===$brand->id)
                                            <option selected value="{{$brand->id}}">{{$brand->name}}</option>
                                        @else 
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    
                                    
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="input-group">
                            
                            <div style="float: right">
                                <input class="form-control fc-datepicker" name='start_at' style="border-radius: 15px; background: #F2F4F9; border-color: #F2F4F9;" maxlength="10" value="{{(new Carbon($ads->start_at))->toDateString()}}" type="date">

                            </div>
                            <img src="{{asset('files/Groupe 566.png')}}" alt="">
                            <div style="float: left">
                                <input class="form-control fc-datepicker" name='end_at' style="border-radius: 15px; background: #F2F4F9; border-color: #F2F4F9;" maxlength="10" value="{{(new Carbon($ads->end_at))->toDateString()}}" type="date">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description"  class="form-control-label">Description</label>
                            <textarea type="text" value="{{$ads->description}}" name="description" class="form-control" id="description">{{$ads->description}}</textarea>
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