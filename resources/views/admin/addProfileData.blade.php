<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <title>Add Profile Data</title>
</head>

<body>
    <form method="post" action={{route('user.addData')}} enctype="multipart/form-data">@csrf
        <div class="container justify-content-center">
            <p>Add Profile Data</p>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        {{--  <div class="row mb-4">  --}}
          <div class="col-md-12">
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" name="name" value="{{$profile_data->name}}"/>
              <label class="form-label" for="form6Example1">Full name</label>
            </div>
          </div>
        {{--  </div>  --}}

        <!-- Text input -->
        <div class="col-md-4">
          <input type="text" id="form6Example3" class="form-control" name="phone" value="{{$profile_data->phone}}" />
          <label class="form-label" for="form6Example3">Phone Number</label>
        </div>

        <!-- Text input -->
        <div class="col-md-12">
          <input type="text" id="form6Example4" class="form-control" name="address" value="{{$profile_data->address}}"/>
          <label class="form-label" for="form6Example4">Address</label>
        </div>

        <!-- Email input -->
        <div class="col-md-4">
          <input type="email" id="form6Example5" class="form-control" name="email" value="{{$profile_data->email}}"/>
          <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile" name="img">
                    <label class="custom-file-label" for="inputGroupFile" aria-describedby="inputGroupFileAddon">Choose image</label>
                </div>
                <div class="border rounded-lg text-center p-3 col-md-4">
                    <img src="{{asset('profile_image/'.$profile_data->img)}}" class="img-fluid" id="preview" />
                </div>
            </div>

        </div>

        <!-- Message input -->
        <div class="col-md-8">
          <textarea class="form-control" id="form6Example7" rows="4" name="about">{{$profile_data->about}}</textarea>
          <label class="form-label" for="form6Example7">About</label>
        </div>

        <!-- Submit button -->
        <input type="hidden" name="id" id="profile_id" value="{{$profile_data->id}}">
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
    </div>
      </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        // input plugin
        bsCustomFileInput.init();

        // get file and preview image
        $("#inputGroupFile").on('change',function(){
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        })

    })

</script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>





</html>
