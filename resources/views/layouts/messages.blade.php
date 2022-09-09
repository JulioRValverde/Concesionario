@if (session()->has('success'))
        <script>
                notifyMessage('{{ session("success") }}', 'success');
        </script>
@endif

@if (session()->has('error'))
        <script>
                notifyMessage('{{ session("error") }}', 'error');
        </script>
@endif

@push('scripts')
<script>
    const notifyMessage = (message, type) => {
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type,
                    background: type === 'success' ? '#10B981' : '#FA5252',
                    icon: {
                        className: 'fas fa-times',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }
            ]
        });
        notyf.open({
            type,
            message
        });
    }
</script>
@endpush