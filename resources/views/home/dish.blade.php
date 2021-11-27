@extends('layouts.app')
@section('content')
    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Le nostre pietanze
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">Tutti</li>
                @foreach ($categories as $category)
                    <li data-filter="{{ '.cat' . $category->id }}">{{ $category->Nome }}</li>
                @endforeach
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @for ($i = 0; $i < 6 && $i < count($products); $i++)
                        <div class="col-sm-6 col-lg-4 all {{ 'cat' . $products[$i]->Categoria }}">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ asset('storage/' . $products[$i]->Immagine) }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $products[$i]->Nome }}
                                        </h5>
                                        <p>
                                            {{ $products[$i]->Descrizione }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                &euro;{{ $products[$i]->Prezzo }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    @foreach ($products as $product)
                    @endforeach
                </div>
            </div>
            <div class="btn-box">
                <a href="{{ route('product') }}">
                    View More
                </a>
            </div>
        </div>
    </section>
@endsection
