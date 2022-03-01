@if(!empty($edit))
    <a href="{{$edit}}" class="action-icon text-warning"> <i class="fas fa-edit"></i></a>
@endif
@if(!empty($delete))
    <a wire:click.prevent="delete({{$delete}})" href="{{ 'hapus/' . $delete }}" class="action-icon text-danger">
        <i class="fa fa-trash-alt"></i>
    </a>
@endif
