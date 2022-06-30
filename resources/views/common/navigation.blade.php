<div class="user">
    <img src="{{ $user->avatar }}" class="avatar" alt="{{ $user->name }}">
    <div class="user-name">{{ $user->name }}</div>
    <a href="/logout">Logout</a>
</div>

<ul>
    <li><a href="/"><i class="icon-home"></i> Home</a></li>
    <li><a href="/miners"><i class="icon-users"></i>Miners</a></li>
    <li><a href="/moon-admin/list"><i class="icon-">&#9789;</i>Moons</a><br></li>
    <li><a href="/moon-admin">&nbsp; &nbsp; &nbsp; Moon Admin</a><br></li>
    <li><a href="/extractions">&nbsp; &nbsp; &nbsp; Extractions</a><br></li>
    <li><a href="/renters"><i class="icon-rocket"></i>Renters</a> </li>
    <li><a href="/renters/expired">&nbsp; &nbsp; &nbsp; &nbsp;Expired contracts</a> </li>
    <li><a href="/reports"><i class="icon-stats-dots"></i>Reports</a></li>
    <li><a href="/timers"><i class="icon-calendar"></i>Timers</a></li>
    <li><a href="/taxes"><i class="icon-coin-dollar"></i>Taxes</a></li>
    <li><a href="/emails"><i class="icon-envelop"></i>Manage Emails</a></li>
    <li><a href="/access"><i class="icon-cog"></i>Settings</a></li>
    <li><a href="/payment"><i class="icon-credit-card"></i>Manual Payment</a></li>
</ul>
