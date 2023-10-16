<style>
#search-form-unique:hover{
    background-color: #d0497a !important;
}
</style>
<li id="search-form-unique">

    <div class="form-inline my-2">
        <div class="input-group" data-widget="sidebar-search" data-arrow-sign="&raquo;">

            {{-- Search input --}}
            <input class="form-control bg-white form-control-sidebar" type="search"
                @isset($item['id']) id="{{ $item['id'] }}" @endisset
                placeholder="{{ $item['text'] }}"
                aria-label="{{ $item['text'] }}">

            {{-- Search button --}}
            <div class="input-group-append">
                <button class="btn btn-sidebar bg-pink">
                    <i class="fas fa-fw fa-search text-white"></i>
                </button>
            </div>

        </div>
    </div>

</li>
