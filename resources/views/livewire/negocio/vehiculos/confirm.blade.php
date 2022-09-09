<div wire:ignore.self class="modal fade" id="modal-confirmation" tabindex="-1" role="dialog" aria-labelledby="modal-confirmation" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-danger">
            <button type="button" class="btn-close theme-settings-close fs-6 ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header">
                <p class="modal-title text-gray-200" id="modal-title-notification">
                    Por favor confirma esa acción
                </p>
            </div>
            <div class="modal-body text-white">
                <div class="py-3 text-center">
                    <span class="modal-icon">
                        <i class="fa fa-question fa-3x"></i>
                    </span>
                    <h2 class="h4 modal-title my-3">Confirmar!</h2>
                    <p>
                        Esta acción no se puede deshacer, ¿está seguro que desea eliminar la organización de la base de datos?
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-default text-white" wire:click="destroy()">Eliminar Vehiculo</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            const modalHtml = document.querySelector('#modal-confirmation');
            const modal = bootstrap.Modal.getInstance(modalHtml);

            modal && modal.hide();
        });
    </script>
@endpush
