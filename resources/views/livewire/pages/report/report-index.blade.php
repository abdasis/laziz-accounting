<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">
        <div class="col-md-3">
            <a href="">
                <div class="card border-top border-primary">
                    <div class="card-body py-4 text-center">
                        <img src="{{asset('assets/images/report.png')}}" class="d-grid mx-auto mb-3" alt="">
                        <h4>Journal Cash Out</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="">
                <div class="card border-top border-primary">
                    <div class="card-body py-4 text-center">
                        <img src="{{asset('assets/images/report.png')}}" class="d-grid mx-auto mb-3" alt="">
                        <h4>Journal Cash In</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('reports.purchases-journal')}}">
                <div class="card border-top border-primary">
                    <div class="card-body py-4 text-center">
                        <img src="{{asset('assets/images/report.png')}}" class="d-grid mx-auto mb-3" alt="">
                        <h4>Purchase Journal</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('reports.sales-journal')}}">
                <div class="card border-top border-primary">
                    <div class="card-body py-4 text-center">
                        <img src="{{asset('assets/images/report.png')}}" class="d-grid mx-auto mb-3" alt="">
                        <h4>Sales Journal</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
