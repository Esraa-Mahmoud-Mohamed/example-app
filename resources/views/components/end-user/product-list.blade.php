                        <div class="product-item-sm d-flex">
                            <div class="thumbnail">
                                @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/'.$product->images->first()->path) }}" alt="Image"
                                    class="img-fluid">
                                @endif
                            </div>
                            <div class="pt-3">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ Str::limit($product->description, 80) }}</p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>