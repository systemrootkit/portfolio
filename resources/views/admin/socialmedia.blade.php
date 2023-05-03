<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <title>Document</title>
</head>
<body>
    <div class="modal-body">
        <form action="{{route('user.links')}}" method="post">@csrf
        <div class="form-row">

          <div class=" col-md-6">

            <label for="inputEmail4">Github</label>
            <input type="text" class="form-control" id="git_link" placeholder="github" name="github" value={{@$community_links_data->git}}>

          </div>
          <div class=" col-md-6">
            <label for="inputEmail4">Instagram</label>
            <input type="text" class="form-control" id="instagram_link" placeholder="instagram" name="instagram" value={{@$community_links_data->instagram}}>
          </div>
          <div class=" col-md-6">
            <label for="inputEmail4">Facebook</label>
            <input type="text" class="form-control" id="fb_link" placeholder="facebook" name="facebook" value={{@$community_links_data->facebook}}>
          </div>
          <div class="col-md-6">
            <label for="inputEmail4">Linkedin</label>
            <input type="text" class="form-control" id="linkedin_link" placeholder="linkedin" name="linkedin" value={{@$community_links_data->linkedin}}>
          </div>
          <div class=" col-md-6">
            <label for="inputEmail4">Twitter</label>
            <input type="text" class="form-control" id="twitter_link" placeholder="twitter" name="twitter" value={{@$community_links_data->twitter}}>
          </div>

          <input type="hidden" value="{{@$community_links_data->id}}" name="social_id">

        <div class="col-md-12 p-5">
        <button class="btn btn-primary link_button" type="submit">Submit</button>
        </div>
    </form>
      </div>
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
            toastr.options.timeOut=3000;
            @if (Session::has('success'))
                toastr.success('{{Session::get('success')}}');
            @endif
        });
    </script>
</html>
