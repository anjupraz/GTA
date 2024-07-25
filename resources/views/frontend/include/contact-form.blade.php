<form action="{{ route('contact.send') }}" method="post" class="wpcf7-form" novalidate="novalidate">
    @csrf
    <div class="dived d-flex">
        <div class="form-group">
            <div class="form-sup">
                <div class="cal-01">
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name">
                    <i class="fal fa-user-tie"></i>
                    @error('name')
                        <small class="error">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="cal-01">
                    <input type="email" name="email" id="" class="form-control" placeholder="Enter Your Email">
                    <i class="fal fa-user-tie"></i>
                    @error('email')
                        <small class="error">*{{ $message }}</small>
                    @enderror
                </div>
                <div class="cal-01">
                    <input type="text" name="phone" id="" class="form-control" placeholder="Enter Your Contact">
                    <i class="fal fa-phone"></i>
                    @error('phone')
                        <small class="error">*{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="ca-ool">
            <textarea name="message" cols="80" rows="6" class="form-control" placeholder="Message"></textarea>
            @error('message')
                <small class="error">*{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-primary mt-4 ml-2">Send Message</button>
        </div>
    </div>
</form>
