@livewire('partials.navbar')

<h3>ev</h3>

{{-- <h1>{{ Request::route()->getName() . ' . Privilege: '. $privilege }}</h1> --}}

@if ($privilege == 'vendor')
    @livewire('user.vendor.shop')
@endif

@if ($privilege == 'customer')
    @livewire('user.customer.shop')
@endif
