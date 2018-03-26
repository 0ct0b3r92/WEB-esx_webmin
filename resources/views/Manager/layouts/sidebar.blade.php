<ul class="nav nav-pills flex-column">
    <li>
        <h6 class="nav-header">Général</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('manager.index') }}"><i class="fa fa-home"></i> Accueil</a>
    </li>


</ul>


<ul class="nav nav-pills flex-column">
    <li>
        <h6 class="nav-header">FiveM</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('manager.jobs.index')}}"><i class="fa fa-building"></i> Entreprise</a>
    </li>
</ul>

<ul class="nav nav-pills flex-column">
    <li>
        <h6 class="nav-header">Administration</h6>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-parent" href="#">
            <i class="fa fa-users"></i>
            Membre
        </a>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager.members.index') }}">Liste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('manager.whitelist.index')}}">Candidature</a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link"href="{{ route('manager.settings')}}">
            <i class="fa fa-cogs"></i> <span>Réglages</span>
        </a>
    </li>
</ul>


