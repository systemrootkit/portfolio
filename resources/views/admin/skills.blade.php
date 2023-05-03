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
<style>
    .container {
        max-width: 500px;
    }
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }
</style>

<body>
    <form method="post" action={{route('skill.add')}} enctype="multipart/form-data">@csrf
        <div class="container justify-content-center">
            <p>Add Skills </p>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        {{--  <div class="row mb-4">  --}}
          <div class="col-md-12">

        <!-- Number input -->

            <div class="user-image mb-3 text-center">
                @foreach ( $skills as $skill )
                <div class="imgPreview">
                    {{--  <div class="border rounded-lg text-center p-3 col-md-4">  --}}
                        <img src="{{asset('skills/'.$skill->skill_name)}}" class="img-fluid" id="preview" />
                        <button type="button" class="close" onclick="rmvImg({{$skill->id}})">
                            <span>&times;</span>
                          </button>
                    {{--  </div>  --}}
                </div>
                @endforeach

            </div>
            <div class="custom-file">
                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                <label class="custom-file-label" for="images">Choose image</label>
            </div>

        <!-- Submit button -->
        <input type="hidden" name="id" id="profile_id" value="">
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Images
        </button>
    </div>
      </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>  --}}
{{--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });

</script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>

<script>
    function rmvImg(v1){
        var data = v1;
        $.ajax({
            type:'get',
            dataType:'json',
            url:"{{url('skills/remove')}}",
            data:{
                'data':data,
            },
            success:function(data){
                console.log(data);
                setTimeout(()=>{
                    toastr.success(data.success);
                },500)
                location.reload();
            },

        });
    }
</script>



</html>
