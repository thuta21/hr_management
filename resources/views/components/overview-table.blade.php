<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>Employee</th>
        @foreach ($periods as $period)
            <th>{{$period->format('d')}}</th>
        @endforeach
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    @foreach ($periods as $period)
                        @php
                            $checkin_icon = '';
                            $checkout_icon = '';
                            $attendance = collect($attendances)->where('user_id',$employee->id)->where('date', $period->format('Y-m-d'))->first();
                            
                            $office_start_time = $period->format('Y-m-d'). ' ' .$company_setting->office_start_time;
                            $office_end_time = $period->format('Y-m-d'). ' ' .$company_setting->office_end_time;
                            $break_start_time = $period->format('Y-m-d'). ' ' .$company_setting->break_start_time;
                            $break_end_time = $period->format('Y-m-d'). ' ' .$company_setting->break_end_time;


                            if($attendance)
                            {
                                if($attendance->checkin_time < $office_start_time)
                                {
                                    $checkin_icon = '<i class="fas fa-check-circle text-success"></i>';
                                }elseif ($attendance->checkin_time > $office_start_time && $attendance->checkin_time < $break_start_time) {
                                    $checkin_icon = '<i class="fas fa-check-circle text-warning"></i>';
                                }else{
                                    $checkin_icon = '<i class="fas fa-times-circle text-danger"></i>';
                                }

                                if($attendance->checkout_time < $break_end_time)
                                {
                                    $checkout_icon = '<i class="fas fa-times-circle text-danger"></i>';
                                }elseif($attendance->checkout_time > $break_end_time && $attendance->checkout_time < $office_end_time)
                                {
                                    $checkout_icon = '<i class="fas fa-check-circle text-warning"></i>';
                                }else
                                {
                                    $checkout_icon = '<i class="fas fa-check-circle text-success"></i>';
                                }
                            }

                        @endphp
                        <td>
                            <div>{!!$checkin_icon!!}</div>
                            <div>{!!$checkout_icon!!}</div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>