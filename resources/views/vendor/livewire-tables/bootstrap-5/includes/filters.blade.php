@if ($showFilterDropdown && ($filtersView || count($customFilters)))
    <div
        x-cloak
        x-data="{ open: false }"
        x-on:keydown.escape.stop="open = false"
        x-on:mousedown.away="open = false"
        class="btn-group d-block d-md-inline"
    >
        <button
            x-on:click="open = !open"
            type="button"
            class="btn bg-soft-light border dropdown-toggle d-block w-100 d-md-inline"
        >
            <i class="mdi mdi-filter me-1"></i>
            @lang('Filters')

            @if (count($this->getFiltersWithoutSearch()))
                <span class="badge bg-info">
                   {{ count($this->getFiltersWithoutSearch()) }}
                </span>
            @endif

            <span class="caret"></span>
        </button>
        <ul
            class="dropdown-menu"
            x-bind:class="{'show' : open}"
            role="menu"
            style="min-width: 200px;"
        >
            <li>
                @if ($filtersView)
                    @include($filtersView)
                @elseif (count($customFilters))
                    @foreach ($customFilters as $key => $filter)
                        <div wire:key="filter-{{ $key }}" class="px-2 pb-1">
                            <label for="filter-{{ $key }}" class="mb-0">
                                {{ $filter->name() }}
                            </label>
                            @if ($filter->isSelect())
                                @include('livewire-tables::bootstrap-5.includes.filter-type-select')
                            @elseif($filter->isMultiSelect())
                                @include('livewire-tables::bootstrap-5.includes.filter-type-multiselect')
                            @elseif($filter->isDate())
                                @include('livewire-tables::bootstrap-5.includes.filter-type-date')
                            @elseif($filter->isDatetime())
                                @include('livewire-tables::bootstrap-5.includes.filter-type-datetime')
                            @endif
                        </div>
                    @endforeach
                @endif

                @if (count($this->getFiltersWithoutSearch()))
                    <div class="dropdown-divider"></div>

                    <button
                        wire:click.prevent="resetFilters"
                        x-on:click="open = false"
                        class="dropdown-item text-center"
                    >
                        @lang('Clear')
                    </button>
                @endif
            </li>
        </ul>
    </div>
@endif
