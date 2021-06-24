@extends("layouts.app")
@section("content")
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
<form action="/add-poster-action" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-5 mb-3">
        <label for="form1" class="form-label">عنوان</label>
        <input type="text" class="form-control" id="form1" name="title" placeholder="title">
    </div>
{{--    <div class="mt-5 mb-3">--}}
{{--        <select class="form-select" aria-label="Default select example">--}}
{{--            <option selected>انتخاب دسته بندی</option>--}}
{{--            <option value="One">One</option>--}}
{{--            <option value="Two">Two</option>--}}
{{--            <option value="Three">Three</option>--}}
{{--        </select>--}}
{{--    </div>--}}
    <div class="mt-5 mb-3">
        <label for="form3" class="form-label">محتوای اگهی</label>
        <textarea class="form-control" name="content" id="form3" rows="3"></textarea>
    </div>
    <div class="mt-5 mb-3">
        <label for="formFile" class="form-label">انتخاب عکس</label>
        <input class="form-control" type="file" id="formFile" name="file" multiple>
    </div>
    <div class="mt-5 mb-3">
        <button type="submit" class="btn btn-primary">ارسال</button>
    </div>
</form>

@endsection
