@extends('layouts.master')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <h5>QR Code</h5>
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($hashValue)) !!} ">
                    <p class="text-muted">Please scan QR to check in or check out</p>
                </div>
                <hr>
                <div class="text-center">
                    <h5 >Pin Code</h5>
                    <input type="text" name="mycode" id="pincode-input1">
                    <p class="text-muted">Please enter your pin code to check in or check out</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('#pincode-input1').pincodeInput({inputs:6,complete:function(value, e, errorElement){
          console.log("code entered: " + value);
          
          /*do some code checking here*/
          $.ajax({
            url: '/checkin-checkout/store',
            type: 'POST',
            data: {"pin_code" : value},
            success: function(response){
                if(response.status == 'success'){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }

                $('.pincode-input-container .pincode-input-text').val("");
                $('.pincode-input-text').first().select().focus();
            }
          })
          
        }});

        $('.pincode-input-text').first().select().focus();

    </script>
@endsection