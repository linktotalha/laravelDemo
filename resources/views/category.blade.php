@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form>
                <div class="mb-3">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="desc"></textarea>
                </div>
                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#submitBtn").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/categories",
                    success:function(res) {
                        console.log(res);
                    }
                });
            });
        });
    </script>
@endsection
