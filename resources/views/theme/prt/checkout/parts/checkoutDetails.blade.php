<div role="main" class="main shop py-4">
    <div class="container">
        <div class="row">
            @if (isset($order_for) && $order_for == 'credit')
            @include('theme.prt.checkout.parts.forIndivisualCredit')
            @else
                @if($package->package_for=='individual')
                @include('theme.prt.checkout.parts.forIndivisual')
                @elseif($package->package_for =='company')
                @include('theme.prt.checkout.parts.forCompany')
                {{-- @elseif($package->package_for == 'any')
                @include('theme.prt.checkout.parts.forAny') --}}
                @endif
            @endif
        </div>
    </div>
</div>