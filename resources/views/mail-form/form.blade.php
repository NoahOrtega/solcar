@extends('page.contact')
@section('mailform')
<form class="form" method="POST" action="/contact">

    {{ csrf_field() }}

    <div class="input-section">
        <label for="Name">Name * </label><br>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="input-section">
        <label for="email">Email * </label><br>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="input-section">
        <label for="phone">Phone * </label><br>
        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
    </div>
    <div class="h0neyP0t-section">
        <label for="SSN">Bot detection: Leave this blank. </label><br>
        <input type="text" class="form-control" id="SSN" placeholder="SSN" name="SSN" style="display:none !important" tabindex="-1" autocomplete="false">
    </div>
    <div class="feedback-section">
        <label for="comment">Message </label>
        <textarea type="text" class="form-control" id="comment" placeholder="" name="comment"  cols="30" rows="10" required>{{ old('comment') }}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="submit-button" value="Send">Send</button>
    </div>
</form>

@endsection
