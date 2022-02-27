<div>
    {{-- In work, do what you enjoy. --}}
    <footer class="footer bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    {{\Carbon\Carbon::now()->format('Y')}} &copy; {{config('app.name')}} by <a href=""><strong>Lazizdev</strong></a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
