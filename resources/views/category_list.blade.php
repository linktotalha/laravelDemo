@extends('layouts.master')

@section('content')
    {{-- {{$categories}} --}}

    <div class="row">
        <div class="col-md-8">
            <div class="p-3 text-center"><h1>Category List</h1></div>
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->desc}}</td>
                            <td>
                                <a href="{{url('edit_category/'.$category->id)}}" class="btn">Edit</a>
                                <button class="btn deleteBtn" value="{{$category->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
            $('.deleteBtn').click(function() {
                let value = $(this).val();
                $.ajax({
                    url: "{{url('delete_category')}}"+"/"+value,
                    success:function(res){
                        location.reload();
                        toastr.success(res.message);
                    }
                });
            });

        });
        
    </script>
@endsection
