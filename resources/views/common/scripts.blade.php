
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('item-added', msg => {
            $('#theModal').modal('hide')
            ToastrSuccess(msg);
        });

        window.livewire.on('item-updated', msg => {
            $('#theModal').modal('hide')
            ToastrSuccess(msg);
        });

        window.livewire.on('item-destroyed', msg => {
            $('#theModal').modal('hide')
            ToastrSuccess(msg);
        });
        window.livewire.on('error', msg => {
            ToastrDanger(msg);
        });

        $('#theModal').on('hidden.bs.modal', msg => {
            // $('.er').css('display', 'none');
            window.livewire.emit('resetUI');
            console.log('hola')
        });
    });
</script>
@stop

