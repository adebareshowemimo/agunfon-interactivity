{{--
    Anti-spam guard — drop inside any <form> after @csrf.

    Renders an off-screen honeypot field plus an encrypted "form loaded at"
    timestamp. Real visitors never see or fill the honeypot, and never submit
    within a couple of seconds of the page rendering; bots do both. Validated
    server-side by App\Support\SpamGuard. Adds zero friction for real users.
--}}
<div aria-hidden="true" style="position:absolute !important; left:-9999px !important; top:-9999px !important; width:1px; height:1px; overflow:hidden;">
    <label>Leave this field blank
        <input type="text"
               name="{{ \App\Support\SpamGuard::HONEYPOT_FIELD }}"
               tabindex="-1"
               autocomplete="off"
               value="">
    </label>
</div>
<input type="hidden"
       name="{{ \App\Support\SpamGuard::TIMESTAMP_FIELD }}"
       value="{{ \Illuminate\Support\Facades\Crypt::encryptString((string) time()) }}">
