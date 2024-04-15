<div class="category">
    <div class="ht__cat__thumb">
        @if ($item->product_amount == 0)
        <span class="sale-span">Trống sân</span>
        @endif
        <a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">
            <img style="max-width: 260px; height: 260px" src="{{$item->product_image}}" alt="{{$item->product_name}}">
        </a>
    </div>
    <div class="fr__product__inner">
        <h4><a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">{{$item->product_name}}</a></h4>
        <ul class="fr__pro__prize">
            <li class="">{{($item->brand_name)}}</li>
        </ul>
    </div>
</div>
