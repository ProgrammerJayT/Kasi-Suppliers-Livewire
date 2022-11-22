@if ($privilege == 'vendor')
    @livewire('user.shop.vendor')
@endif

@if ($privilege == 'customer')
    @livewire('user.shop.customer')
@endif
