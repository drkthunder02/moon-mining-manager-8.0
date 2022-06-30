<?php
// Retrieve the current user's whitelisted status.
$user = Auth::user();
$whitelist = \App\Models\Whitelist::where('eve_id', $user->eve_id)->first();
$isAdmin = $whitelist && $whitelist->is_admin;
?>

<div class="public-menu">
    <ul>
        <li>
            <a href="/logout">Log out</a>
        </li>
        @if ($isAdmin)
            <li>
                <a href="/">Admin</a>
            </li>
        @endif
        <li>
            <a href="/contact-form"
                @if ($page == 'contact-form')
                    class="current"
                @endif
            >Contact Form</a>
        </li>
        <li>
            <a href="/moons"
                @if ($page == 'moons')
                    class="current"
                @endif
            >Moons available to rent</a>
        </li>
        <li>
            <a href="/timers"
                @if ($page == 'timers')
                    class="current"
                @endif
            >Upcoming moon timers</a>
        </li>
    </ul>
</div>
