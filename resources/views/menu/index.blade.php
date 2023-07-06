@extends('layouts.menu')

@section('content')
<div class="d-flex flex-row">
    <select class="form-select m-3" aria-label="Default select example">
        <option disabled>Lang </option>
        <option value="1">عربي</option>
        <option value="2">en</option>
    </select>
    <select class="form-select m-3" aria-label="Default select example">
        <option value="1">ليرة</option>
        <option value="2">USD</option>
    </select>
</div>
<!-- //currency -->

<div class="d-flex flex-row overflow-scroll fixed-div ">
    @forelse($categories as $category)
    <div class="col-sm-6 col-md-4 col-lg-2 rounded p-3 shadow bg-white m-3 category cursor-pointer" id="{{ $category->id }}">
        <div class="card-body">
            <img src="https://static6.depositphotos.com/1081284/575/v/950/depositphotos_5756775-stock-illustration-italian-pizza.jpg" class="card-img-left img-fluid" alt="Image Description" style="max-width: 100px; object-fit: contain;">

            <h5 class="card-title">{{ $category->name }}</h5>
        </div>
    </div>
    @empty

    @endforelse


</div>
<div style="margin-top: 100px;">

<div class="row p-3 overflow-y-scroll mt-3">
    @forelse($categories as $category)
    <div class="col-12 mb-3" id="category{{ $category->id }}">
        <h6 class="badge bg-success">{{ $category->name }}</h6>
    </div>
    @forelse($category->products as $product)
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body d-flex flex-row">
                <img src="https://static6.depositphotos.com/1081284/575/v/950/depositphotos_5756775-stock-illustration-italian-pizza.jpg" class="card-img-top img-fluid" style="max-width: 100px; object-fit: contain;" alt="Image Description">

                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <span class="badge bg-success">{{$product->price}} $</span>

                </div>

            </div>
        </div>
    </div>
    @empty
    @endforelse
    @empty
    @endforelse
</div>
</div>

@endsection


@section('scripts')

<script>
    $(document).ready(function() {
        $('.category').click(function() {
            let id = $(this).attr('id');

            // Remove active class from all category elements
            $('.category').removeClass('active');

            // Add active class to the clicked category element
            $(this).addClass('active');

            // Scroll to div with id
            $('html, body').animate({
                scrollTop: $('#category' + id).offset().top - 10
            }, 1); // Adjust the animation duration as needed
        });
    });
</script>


@endsection
