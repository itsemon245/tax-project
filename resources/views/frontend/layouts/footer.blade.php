<footer class="top-footer bg-dark">
    <div class="container">
        <div class="d-flex p-4 flex-wrap justify-content-center gap-3">
            <div class="mt-3 mx-auto">
                <div class="d-flex flex-column align-items-center text-light">
                    <p style="font-weight: 500;font-size:18px;">Our Services</p>
                    <div class="d-flex gap-3 align-items-cetner">
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                    </div>
                    <div class="d-flex gap-3 align-items-cetner">
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                    </div>
                    <div class="d-flex gap-3 align-items-cetner">
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                    </div>
                </div>
            </div>
            <div class="divider-vr"></div>
            <div class="mt-3 mx-auto">
                <div class="d-flex flex-column align-items-center text-light">
                    <p style="font-weight: 500;font-size:18px;">About Us</p>
                    <div class="d-flex gap-3 align-items-cetner">
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                    </div>
                    <div class="d-flex gap-3 align-items-cetner">
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                        <a href="#" target="_blank" rel="noopener noreferrer">Lorem, ipsum.</a>
                    </div>
                </div>
            </div>
            <div class="divider-vr"></div>
            <div class="mt-3 mx-auto">
                <div class="d-flex flex-column align-items-center text-light">
                    <p class="mb-1" style="font-weight: 500;font-size:18px;">Stay Connected</p>
                    <div class="social-handles">
                        @foreach (getRecords('social_handles') as $social)
                            <div class="d-flex gap-2 align-items-center">
                                <span class="{{ $social->icon }}"></span>
                                <a class="text-capitalize" href="{{ $social->link }}" target="_blank" rel="noopener noreferrer">{{ $social->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-5" style="font-weight: 500; font-size: 16px;">
            <a href="#" target="_blank" rel="noopener noreferrer" class="">Terms & Codition</a>
            <a href="#" target="_blank" rel="noopener noreferrer" class="">Help & Support</a>
        </div>
    </div>
    <div class="bottom-footer bg-primary text-light mt-3">
        <p class="d-flex align-items-center justify-content-center mb-0">Copyright <span
                class="mdi mdi-copyright mx-2"></span>
            {{ Carbon\Carbon::now()->format('Y') }} all rights reserved by company name</p>
    </div>
</footer>
