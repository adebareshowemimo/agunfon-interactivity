{{--
    Anti-spam guard — drop inside any <form> after @csrf.

    Renders an off-screen honeypot field, a session-bound encrypted form token,
    and a lightweight browser-interaction proof. Validated server-side by
    App\Support\SpamGuard. Adds zero visible friction for real users.
--}}
@props(['form' => null])

@php
    $spamGuardToken = \App\Support\SpamGuard::payload(request(), $form);
@endphp

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
       value="{{ $spamGuardToken }}">
<input type="hidden"
       name="{{ \App\Support\SpamGuard::INTERACTION_FIELD }}"
       value="">
<script>
    (function () {
        var script = document.currentScript;
        var form = script && script.closest('form');
        if (!form) return;

        var token = form.querySelector('input[name="{{ \App\Support\SpamGuard::TIMESTAMP_FIELD }}"]');
        var guard = form.querySelector('input[name="{{ \App\Support\SpamGuard::INTERACTION_FIELD }}"]');
        if (!token || !guard) return;

        var arm = function () {
            guard.value = token.value.slice(-16);
            form.removeEventListener('focusin', arm, true);
            form.removeEventListener('pointerdown', arm, true);
            form.removeEventListener('keydown', arm, true);
            form.removeEventListener('input', arm, true);
        };

        form.addEventListener('focusin', arm, true);
        form.addEventListener('pointerdown', arm, true);
        form.addEventListener('keydown', arm, true);
        form.addEventListener('input', arm, true);
    })();
</script>
