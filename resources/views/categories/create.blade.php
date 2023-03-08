@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h3 class="text-center">Add Category</h3>
            <form id="submitForm">
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="name" class="form-control" id="">
                    <span class="nameErr text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" class="form-control" id=""></textarea>
                    <span class="descErr text-danger"></span>
                </div>
                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row pt-4">
        <div class="col">
            <h3 class="text-center">Category List</h3>
            <table id="categories" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        // Add data using ajax
        $.noConflict();
        $("document").ready(function() {
            $("#submitBtn").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "{{ url('categories/create') }}",
                    data: $("#submitForm").serialize(),
                    success: function(res) {
                      if(res.errors){
                        $(".nameErr").html(res.errors.name);
                        $(".descErr").html(res.errors.desc);
                      }
                      if(res.message){
                        toastr.success(res.message);
                        $('#submitForm').trigger("reset");
                        table.ajax.reload();
                      }
                    }
                });

            });

            // Get data using ajax
            var table = $('#categories').DataTable({
                processing: true,
                ajax: "{{ url('category-list') }}",
                columns: [
                    { data: 'name' },
                    { data: 'desc' },
                    {
                        "data": null,
                        render: function(data,type,row) {
                            return `<button data-id=${row.id} class="btn btn-sm btn-success">Edit</button>`
                        }
                    },
                    {
                        "data": null,
                        render: function(data,type,row) {
                            return `<button data-id=${row.id} class="btn btn-sm btn-danger deleteBtn">Delete</button>`
                        }
                    },
                ],
            });

            // Delete data using ajax
            $("document").on('click','.deleteBtn',function() {
                console.log("Hello")
                if(confirm("Are you sure you want to delete??")){
                    $.ajax({
                        url: "{{url('delete-category')}}",
                        data: {
                            "id":$(this).data('id')
                        },
                        success:function(res) {
                            toastr.success(res.message);
                            table.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
