@extends('flommerce')

@section('content')
<section id="show_all_categories" class="section-top-margin">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">Categories</h4>
                        <div class="card-block">
                            <ul class="nav navbar-nav list-group-inline">
                                @foreach ($categories as $category)
                                    <li class="list-group-item">
                                        <a href="{{ url('/categories', $category->id) }}">{{ $category->title }}</a>
                                            <dd>
                                                {{ $category->description }}
                                            </dd>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
