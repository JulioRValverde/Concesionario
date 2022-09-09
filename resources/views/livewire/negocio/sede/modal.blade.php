<div wire:ignore.self class="modal fade" id="modal-states" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">
                    {{ $toEdit ? 'Editar' : 'Crear' }} Sede
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('livewire.negocio.sede.form')
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            const modalHtml = document.querySelector('#modal-states');
            const modal = bootstrap.Modal.getInstance(modalHtml);

            modal && modal.hide();
        });
    </script>
@endpush