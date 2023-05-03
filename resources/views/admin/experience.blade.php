<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <title>Add Experience Data</title>
</head>

<body>

        <div class="container justify-content-center">
            <p>Add Profile Data</p>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        {{--  <div class="row mb-4">  --}}
            <form action="{{url('experienceStore')}}" method="post">@csrf
          <div class="col-md-12">
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" name="position" value=""/>
              <label class="form-label" for="form6Example1">Position</label>
            </div>
          </div>
        {{--  </div>  --}}

        <!-- Text input -->
        <div class="col-md-12">
          <input type="text" id="form6Example3" class="form-control" name="firm" value="" />
          <label class="form-label" for="form6Example3">Firm Name</label>
        </div>

        <!-- Text input -->
        <div class="col-md-12">
          <input type="text" id="form6Example4" class="form-control" name="duration" value="" placeholder="From-To"/>
          <label class="form-label" for="form6Example4">Duration</label>
        </div>
        <!-- Message input -->
        <div class="col-md-12">
          <textarea class="form-control" id="form6Example7" rows="4" name="about"></textarea>
          <label class="form-label" for="form6Example7">Details</label>
        </div>

        <!-- Submit button -->
        <input type="hidden" name="id" id="exp_id" value="">
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
    </form>
    </div>
    <div class="container">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Postition</th>
                <th>Company_name</th>
                <th>Duration</th>
                {{--  <th>about</th>  --}}
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($experience as $exp )
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$exp->position}}</p>
                      {{--  <p class="text-muted mb-0">john.doe@gmail.com</p>  --}}
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">{{$exp->company_name}}</p>
                {{--  <p class="text-muted mb-0">IT department</p>  --}}
                </td>
                <td>
                  <span class="badge badge-success rounded-pill d-inline">{{$exp->duration}}</span>
                </td>
                {{--  <td>Senior</td>  --}}
                <td>
                  <button type="button" class="btn btn-link btn-sm btn-rounded" id="editBtn($exp->id)" data-id="{{$exp->id}}" onclick="editDataFun({{$exp->id}})">
                    Edit
                  </button>
                  <button type="button" class="btn btn-link btn-sm btn-rounded"  onclick="delDataFun({{$exp->id}})">
                    Delete
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                       <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Postition</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="pd" name="position"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Company_name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="cn" name="firm"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Duration</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dt" name="duration"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">About</label>
                            <div class="col-sm-12">
                                <textarea id="abt" name="detail" required="" placeholder="Enter Details" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="eid">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" id="saveBtn" value="create" onclick="uptDta()">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
{{--  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>  --}}
{{--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  --}}
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
    <script>

        function editDataFun(v1){

            var data = v1;

            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('experience/data')}}",
                data:{
                    'data':data,
                },
                success:function(data){
                    if(data)
                    {
                        $.each(data,function(key,value){
                            console.log(value.id);
                            $('#pd').val(value.position);
                            $('#cn').val(value.company_name);
                            $('#dt').val(value.duration);
                            $('#abt').val(value.about);
                            $('#eid').val(value.id);
                        });
                        $('#ajaxModel').modal("show");
                    }
                },
            });
        }

        function uptDta(){
            var id = $('#eid').val();
            var pos = $('#pd').val();
            var company = $('#cn').val();
            var duration = $('#dt').val();
            var about = $('#abt').val();

            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('experience/update')}}",
                data:{
                    'id':id,
                    'pos':pos,
                    'company':company,
                    'duration':duration,
                    'about':about,
                },
                success:function(data){

                    $('#ajaxModel').modal("hide");
                    location.reload();
                    console.log("data updated successfully")
                    setTimeout(()=>{
                        toastr.success(data.success);
                    },500)
                },

    });
}
    </script>
    <script>
        function delDataFun(v1){
            var id = v1;
            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('experience/delete')}}",
                data:
                {
                    'id':id,
                },
                success:function(data){

                    console.log("deleted successfully");
                    setTimeout(()=>{
                        toastr.success(data.success);
                    },500)
                    location.reload();
                },
            });
        }
    </script>





</html>
