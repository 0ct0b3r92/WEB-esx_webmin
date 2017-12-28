    <li class="{{ isActiveNavRoute('home') }}"><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Accueil</span></a></li>
    @if(Auth::user()->whitelisted)
    <li class="{{ isActiveNavRoute('bugsTraker.index') }}"><a href="{{ route('bugsTraker.index') }}"><i class="fa fa-lightbulb-o"></i> <span>Suggestions & Bugs</span></a></li>
    @endif

    @if(Auth::user()->whitelisted && Auth::user()->Player->Job->Grade->name == "boss")
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Entreprise</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Votre Entreprise</a></li>
            <li><a href="#">Gestion Employé</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->whitelisted && Auth::user()->Player->jobs == "police")
    <li><a href="#"><i class="fa fa-archive"></i> Rechercher Criminel</a></li>
    <li><a href="#"><i class="fa fa-link"></i> Liste des Criminels</a></li>
    <li><a href="#"><i class="fa fa-link"></i> Liste des Crimes</a></li>
    @endif



    @if(Auth::user()->whitelisted && Auth::user()->owner == 1)
    <hr>
    <li {{ isActiveNavRoute( "members.index" ) }} ><a href="{{ route('members.index') }}"><i class="fa fa-users"></i> <span>Liste des Membres</span></a></li>
    <li {{ isActiveNavRoute( ['whitelist.index','whitelist.show','validateWhitelist'] ) }} ><a href="{{ route('whitelist.index') }}"><i class="fa fa-list-ul"></i> <span>Gestion Whitelist</span></a></li>
    <li><a href="#"><i class="fa fa-cogs"></i> <span>Gestion DiscordBot</span></a></li>
    @endif
