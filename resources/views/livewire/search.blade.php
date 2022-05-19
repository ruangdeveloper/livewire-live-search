<div>
    <div class="d-flex justify-content-start mt-5">
        <div>
            <input wire:model.debounce.300ms="query" type="search" class="form-control"
                placeholder="Github username...">
        </div>
    </div>
    <div class="mt-4">
        <div wire:loading.block wire:target="query" class="alert alert-warning" role="alert">
            Sedang mencari data...
        </div>
        <div wire:loading.remove wire:target="query">
            @if (sizeof($results) == 0)
                <div class="alert alert-info" role="alert">
                    Belum ada hasil...
                </div>
            @else
                <div class="row">
                    @foreach ($results as $result)
                        <div class="col-lg-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ $result['avatar_url'] }}" alt=""
                                        class="img-fluid w-100 rounded-circle mb-3">
                                    <h5 class="text-center">
                                        <a href="{{ $result['html_url'] }}" target="blank"
                                            class="text-decoration-none">{{ $result['login'] }}</a>
                                    </h5>
                                    <div class="text-center">
                                        <small class="text-secondary">{{ $result['type'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
