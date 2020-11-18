<?php
    use Carbon\Carbon;
    
?>
<table class="example" class="table " style="width:100%">
    <thead>
        <tr>
            <th class="wd-15p">Type</th>
            <th class="wd-15p">On</th>
            <th class="wd-15p"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data["activities"] as $activity)
            <tr>
                
                    <td><span class="badge badge-primary" style="background: red"><b>deleted</b></span></td>

                <td>Kuwait</td>
                <td><a href="/brands/1">{{$ads->name}} </a></td>
                <td>{{$ads->view_count}}</td>
                <td>{{(new Carbon($ads->start_at))->toDateString()}}</td>
                <td>{{(new Carbon($ads->end_at))->toDateString()}}</td>
                <td>{{$ads->price}}</td>
                <td>
                    <div class="btn-list">
                        @if ($ads->availability === 1)
                            <a href="#" class="btn btn-danger" style="background: red;border-color: red " data-toggle="modal" data-target="{{"#deleteads".$ads->id}}" ><i data-toggle="tooltip" title="" data-original-title="delete" class="zmdi zmdi-delete"></i></a>
                        @endif
                        <a href="#" class="btn btn-primary" style="background: #1FC0D8;border-color: #1FC0D8 " data-toggle="modal" data-target="{{"#updateads".$ads->id}}"><i data-toggle="tooltip" title="" data-original-title="show" class="zmdi zmdi-code-setting"></i></a>
                        <a href="#" class="btn btn-primary" style="background: #3cda08;border-color: #3cda08 "><i data-toggle="tooltip" title="" data-original-title="statistics" class="ion-stats-bars"></i></a>
                        
                    </div>
                </td>
            </tr>
        @endforeach
        
        
        
        
    </tbody>
</table>