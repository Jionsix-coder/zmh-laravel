<ul class="nav navbar-nav collapse navbar-collapse">
    @foreach($items as $menu_item)
        <li class="dropdown">
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
            </a>
        </li>
    @endforeach
    @if($menu_item->title === 'စျေးဝယ်ရန်')
        <ul role="menu" class="sub-menu"> 
            <li><a href="{{ route('shop.index') }}"><i class="fa fa-shopping-cart"></i> ပစ္စည်းများ</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="fa fa-star"></i>  စျေးလှည်း</a></li> 
            <li><a href=""><i class="fa fa-user"></i>  အကောင့်</a></li> 
        </ul>
    @endif
    <li>
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            @method('DELETE')
        <button class="btn-logout" type="submit">ထွက်ရန်</button>
        </form>
    </li>
</ul>

{{-- <ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="/" class="">ပင်မ</a></li>
    <li class="dropdown"><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
            <li><a href="{{ route('shop.index') }}"><i class="fa fa-shopping-cart"></i> ပစ္စည်းများ</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="fa fa-star"></i>  စျေးလှည်း</a></li> 
            <li><a href=""><i class="fa fa-user"></i>  အကောင့်</a></li> 
        </ul>
    </li> 
    <li><a href="">အာမခံ</a></li>
    <li><a href="">စည်းမျဉ်စည်းကမ်း</a></li>
    <li><a href="contact-us.html">ဆက်သွယ်ရန်</a></li>
</ul> --}}