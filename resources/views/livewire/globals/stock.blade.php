@livewire('partials.navbar')

@if ($privilege == 'vendor')
    @livewire('user.vendor.stock')
@endif
