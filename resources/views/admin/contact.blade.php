<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <title>contact</title>
</head>
<body>
    <div class="container">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                {{--  <th>about</th>  --}}
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contact as $con )
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$con->name}}</p>
                      {{--  <p class="text-muted mb-0">john.doe@gmail.com</p>  --}}
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">{{$con->email}}</p>
                {{--  <p class="text-muted mb-0">IT department</p>  --}}
                </td>
                <td>
                  <span class="badge badge-success rounded-pill d-inline">{{$con->created_at->format('Y-m-d')}}</span>
                </td>
                {{--  <td>Senior</td>  --}}
                <td>
                  {{--  <button type="button" class="btn btn-link btn-sm btn-rounded" id="editEduBtn"  onclick="editEduBtn()">
                    Edit
                  </button>  --}}
                  <button type="button" class="btn btn-link btn-sm btn-rounded"  onclick="delEduBtn({{$con->id}})">
                    Delete
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $contact->links() !!}
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>  --}}
{{--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

<script>
    function delEduBtn(v1){
        {{--  alert(v1);  --}}
        var data = v1;
        $.ajax(
        {
            type:'get',
            dataType:'json',
            url:'{{url('contact/del')}}',
            data:
            {
                'data':data,
            },
            success:function(data)
            {
                console.log(data);
                location.reload();
                setTimeout(()=>{
                    toastr.success(data.success);
                },500);
            },
        });
    }
</script>
