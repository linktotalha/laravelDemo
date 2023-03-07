@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form id="formSubmit">
                <div class="mb-3">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="">
                    <span class="nameErr text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea type="text" name="desc" class="form-control" id="desc"></textarea>
                    <span class="descErr text-danger"></span>
                </div>
                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#submitBtn").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "{{ url('/add_categories') }}",
                    data: $('#formSubmit').serialize(),
                    success: function(res) {
                        console.log(res);
                        if(res.name !== ''){
                            $('.nameErr').html(res.name)
                        }
                        if(res.desc !== ''){
                            $('.descErr').html(res.desc)
                        }
                        if(res.message !== ''){
                            toastr.success(res.message);
                            $("#formSubmit").trigger('reset');
                        }
                    }
                });
            });
        });
    </script>
@endsection
