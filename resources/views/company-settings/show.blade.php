<x-app-layout>
    @section('title')
    <h4>Employee's Detail</h4>
    @endsection

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Name</p>
                    <p class="mb-1 text-muted">{{$company_setting->company_name}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Email</p>
                    <p class="mb-1 text-muted">{{$company_setting->company_email}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Phone</p>
                    <p class="mb-1 text-muted">{{$company_setting->company_phone}}</p>
                </div>
                
                <div class="col-md-6 mb-3">
                    <p class="mb-1">Company Address</p>
                    <p class="mb-1 text-muted">{{$company_setting->company_address}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Office Start Time</p>
                    <p class="mb-1 text-muted">{{$company_setting->office_start_time}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Office End Time</p>
                    <p class="mb-1 text-muted">{{$company_setting->office_end_time}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Break Start Time</p>
                    <p class="mb-1 text-muted">{{$company_setting->break_start_time}}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <p class="mb-1">Brean End Time</p>
                    <p class="mb-1 text-muted">{{$company_setting->break_end_time}}</p>
                </div>

                <div class="col-12 text-center">
                    <a href="{{route('company-settings.edit', 1)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> EDIT</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>