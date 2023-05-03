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
        <form action="{{url('education/store')}}" method="post">@csrf
          <div class="col-md-12">
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" name="university" value=""/>
              <label class="form-label" for="form6Example1">University Name</label>
            </div>
          </div>
        {{--  </div>  --}}
        <!-- Text input -->
        <div class="col-md-12">
          <input type="text" id="form6Example4" class="form-control" name="duration" value="" />
          <label class="form-label" for="form6Example4">Duration of Course</label>
        </div>
        <div class="col-md-12">
            <input type="text" id="form6Example4" class="form-control" name="degree" value="" />
            <label class="form-label" for="form6Example4">Degree Name</label>
          </div>
          <div class="col-md-12">
            <input type="text" id="form6Example4" class="form-control" name="course" value="" />
            <label class="form-label" for="form6Example4">Course</label>
          </div>
          <div class="col-md-12">
            <input type="text" id="form6Example4" class="form-control" name="gpa" value="" />
            <label class="form-label" for="form6Example4">Gpa</label>
          </div>

        <!-- Submit button -->
        <input type="hidden" name="id" id="exp_id" value="">
        <button type="submit" class="btn btn-primary btn-block mb-4" >Submit</button>
    </form>
    </div>
    <div class="container">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>University</th>
                <th>Degree</th>
                <th>Duration</th>
                {{--  <th>about</th>  --}}
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data_edu as $edu)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$edu->university}}</p>
                      {{--  <p class="text-muted mb-0">john.doe@gmail.com</p>  --}}
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">{{$edu->degree}}</p>
                {{--  <p class="text-muted mb-0">IT department</p>  --}}
                </td>
                <td>
                  <span class="badge badge-success rounded-pill d-inline">{{$edu->duration}}</span>
                </td>
                {{--  <td>Senior</td>  --}}
                <td>
                  <button type="button" class="btn btn-link btn-sm btn-rounded" id="editEduBtn"  onclick="editEduBtn({{$edu->id}})">
                    Edit
                  </button>
                  <button type="button" class="btn btn-link btn-sm btn-rounded"  onclick="delEduBtn({{$edu->id}})">
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
                            <label for="name" class="col-sm-2 control-label">University</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="ucty" name="university"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Duration</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dt" name="duration"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Course</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="cse" name="course"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Degree</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dge" name="degree"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">GPA</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="gpa" name="gpa"  value="" maxlength="50" required="">
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

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
    <script>
        function editEduBtn(v1){
            var data = v1;
            {{--  alert(data);  --}}
            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('education/data')}}",
                data:{
                    'data':data,
                },
                success:function(data){
                    if(data)
                    {
                        $.each(data,function(key,value){
                            console.log(value.id);
                            $('#ucty').val(value.university);
                            $('#dt').val(value.duration);
                            $('#cse').val(value.course);
                            $('#dge').val(value.degree);
                            $('#gpa').val(value.gpa);
                            $('#eid').val(value.id);
                        });
                        $('#ajaxModel').modal("show");
                    }
                },
            });
        }
        function uptDta(){
            var id = $('#eid').val();
            var university = $('#ucty').val();
            var course = $('#cse').val();
            var duration = $('#dt').val();
            var degree = $('#dge').val();
            var gpa = $('#gpa').val();
            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('education/update')}}",
                data:{
                    'id':id,
                    'university':university,
                    'course':course,
                    'duration':duration,
                    'degree':degree,
                    'gpa':gpa,
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
        function delEduBtn(v1){
            var id = v1;
            $.ajax({
                type:'get',
                dataType:'json',
                url:"{{url('education/delete')}}",
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
    <script>
    </script>

</html>
