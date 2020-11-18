<?php
    use Carbon\Carbon;
    
?>
<table class="example" class="table " style="width:100%">
    <thead>
        <tr>
            <th class="wd-15p">Active From</th>
            <th class="wd-25p">Ends At</th>
            <th class="wd-15p">availabily</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['subs'] as $sub)
            <tr>
                <td><a href="/ads/1">{{(new Carbon($sub->start_at))->toDateString()}}</a></td>
                <td>{{(new Carbon($sub->end_at))->toDateString()}}</td>
                @if ($sub->status === 1)
                    <td>active</td>
                    
                @else
                    <td>expired</td>
                @endif
                
            </tr>
        @endforeach
        
        
        
        
    </tbody>
</table>