Hi {{ $name  }}.
<p>Your registration is complited. Please click the link to get access</p>

{{ route('confirmation', $token)  }}