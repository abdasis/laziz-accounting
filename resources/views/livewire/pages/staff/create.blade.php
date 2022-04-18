<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card border-top">
        <div class="card-header bg-white d-flex justify-content-between">
            <h4>Staff Baru</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-primary mb-3">
                        <i class="fe-user"></i>
                        Data User
                    </h4>
                    <form wire:submit.prevent="store">
                        <div class="mb-2 row align-items-center">
                            <div class="col-md-4">
                                Nama Staff
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <x-form-input name="name" placeholder="Masukan nama lengkap" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-2 row align-items-center">
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <x-form-input name="email" placeholder="Masukan email" type="email" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 row align-items-center">
                            <div class="col-md-4">
                                Password
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <x-form-input name="password" placeholder="Masukan password" type="password" />
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 row align-items-center">
                            <div class="col-md-4">
                                Konfirmasi Password
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <x-form-input name="password_confirmation" placeholder="Masukan password kembali" type="password" />
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary float-end width-lg">
                            <i class="fe-save me-1"></i>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
