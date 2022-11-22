@if ($privilege == 'vendor')
    @livewire('user.dashboard.vendor')
@elseif ($privilege == 'customer')
    @livewire('user.dashboard.customer')
@elseif ($privilege == 'admin')
    @livewire('user.dashboard.admin')
@endif
