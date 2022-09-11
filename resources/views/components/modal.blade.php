<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div class="modal fade" id="{{$target}}" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white border-bottom border-light">
                    <h5 class="modal-title fw-bold" id="{{$title_id}}">{{$title}}</h5>
                    <button type="button" wire:click.prevent="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('refresh', () => {
            $('#{{$target}}').modal('hide');
        });
    </script>
@endpush
