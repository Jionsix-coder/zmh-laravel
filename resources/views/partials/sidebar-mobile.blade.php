    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        @if(Cart::count() > 0)
        <div class="navigation__content">
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    @foreach (Cart::content() as $item)
                        <div class="ps-product--cart-mobile">
                            <div class="ps-product__thumbnail"><a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="{{ $item->model->name }}"></a></div>
                            <div class="ps-product__content">
                                <form action="{{ route('cart.destroy',$item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button class="ps-product__remove" ><i class="icon-cross"></i></button>
                                </form>
                                <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                <small>(1 x {{ presentPrice($item->model->price) }})</small>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>{{ presentPrice(Cart::subtotal()) }}</strong></h3>
                    <figure><a href="#"></a><a class="ps-btn" href="{{ route('cart.index') }}">ဈေးခြင်းသို့</a></figure>
                </div>
                @else
                    <h3 style="text-align:center;color:red;font-weight:bold;margin:30px;">ဈေးခြင်းတွင်ပစ္စည်းမရှိပါ။</h3>
                @endif
            </div>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">        
                @foreach (App\Models\Category::with('childs')->where('p_id',0)->get() as $item)
                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{ route('shop.index',['category' => $item->slug]) }}">{{ $item->name }}</a><span class="sub-toggle" style="{{ $item->childs->count() > 0 ? 'display:initial' : 'display:none;'}}"></span>
                    <div class="mega-menu">
                        <ul>
                        @foreach ($item->childs as $itemChilds)
                                <li><a href="{{ route('shop.index',['category' => $itemChilds->slug]) }}"><h4>{{ $itemChilds->name }}</h4></a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="{{ route('shop.search') }}" method="GET">
                <div class="form-group--nest">
                    <input class="form-control" placeholder="ပစ္စည်းများရှာရန်" name="query" value="{{ request()->input('query') }}" id="query">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="{{ route('landing.page') }}">ပင်မ</a></li>
                <li class="menu-item-has-children"><a href="{{ route('shop.index') }}">စျေးဝယ်ရန်</a></li>
                <li class="menu-item-has-children"><a href="{{ route('cart.save') }}">ရွှေးချယ်ပစ္စည်း</a></li>
                <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{ route('navbar.discipline') }}">စည်းမျဉ်းစည်းကမ်း</a><span class="sub-toggle"></span>
                    <div class="mega-menu" style="margin:0 15px;">
                        <h4><a href="{{ route('navbar.armakhan') }}">အာမခံ</a></h4>
                        <h4><a href="{{ route('navbar.aboutmember') }}">အဖွဲ့ဝင်များသိထားရန်</a></h4>
                        <h4><a href="{{ route('navbar.newmember') }}">အဖွဲ့ဝင်သစ်လိုအပ်ချက်</a></h4>
                    </div>
                </li>
                <li class="menu-item-has-children"><a href="{{ route('pages.aboutUs') }}">About Us</a></li>
                <li class="menu-item-has-children"><a href="{{ route('pages.faqs') }}">Faqs</a></li>
                <li class="menu-item-has-children"><a href="{{ route('pages.contactUs') }}">ဆက်သွယ်ရန်</a></li>
            </ul>
        </div>
    </div>